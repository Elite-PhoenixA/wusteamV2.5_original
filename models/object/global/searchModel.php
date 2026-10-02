<?php
/**
 * @author Vương Thanh Diệu
 */
$file_path = $_SERVER['DOCUMENT_ROOT'].'/public/cache/keywords_data.json';
$keyword = isset($_GET['q']) ? trim($_GET['q']) : '';
$type = isset($_GET['type']) ? $_GET['type'] : 'code';
$typeList = ['user' => 'Người Dùng', 'forum' => 'Diễn Đàn', 'code' => 'Mã Nguồn'];
if (!empty($keyword) && array_key_exists($type, $typeList)) {
    $data = file_exists($file_path) ? json_decode(file_get_contents($file_path), true) : [];
    $key = $keyword . '|' . $type . '|' . $ip;
    if (!isset($data[$key])) {
        $data[$key] = 1;
        file_put_contents($file_path, json_encode($data));
    }
}
function PopularKeywords($file_path, $limit = 5, $minSearches = 5) {
    if (file_exists($file_path)) {
        $data = json_decode(file_get_contents($file_path), true);

        if (!$data) {
            return [];
        }
        $keywordCounts = [];

        foreach ($data as $key => $count) {
            $parts = explode('|', $key);
            if (count($parts) < 3) {
                continue;
            }
            $keyword = $parts[0];
            $ip = $parts[2];
            $uniqueKey = $keyword . '|' . $ip;
            
            if (!isset($keywordCounts[$uniqueKey])) {
                $keywordCounts[$uniqueKey] = 0;
            }
            $keywordCounts[$uniqueKey]++;
        }

        $filteredKeywords = array_filter($keywordCounts, function($count) use ($minSearches) {
            return $count >= $minSearches;
        });

        arsort($filteredKeywords);
        $popularKeywords = array_slice(array_keys($filteredKeywords), 0, $limit);
        return $popularKeywords;
    }
    return [];
}