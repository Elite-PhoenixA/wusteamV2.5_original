  <div class="ajax-item">
    <div style="padding: 40px 20px;" class="colorful-bg c-blue flex jc zib-widget">
      <div class="colorful-make"></div>
      <div class="text-center">
        <div class="em4x">
        <img class="no-events-img" style="height:60px;"src="/<?=__IMG__.'/icon/verify.png'?>" alt="User Verify">
        </div>
        <div class="mt10 em14 padding-w10 font-bold mb40">Xác Minh Danh Tính
        </div>
        <div class="text-left">
          <div class="em12 mb10">
          <img class="no-events-img" style="height:20px;margin-top:-4px;" src="/<?=__IMG__.'/icon/verify.png'?>" alt="User Verify">
            <b>Nộp đơn xin chứng nhận</b>
          </div>
          <div class="muted-color">
            <div class="ml10">
              <li>Người dùng được chứng nhận sẽ hiển thị huy hiệu xác minh phía sau biệt hiệu của họ và được hưởng nhiều ưu đãi khác nhau.</li>
              <li>Khi đăng ký chứng nhận, vui lòng đảm bảo rằng thông tin là đúng sự thật. Quá trình xử lý thường mất 1-2 ngày làm việc.</li>
              <li>Sẽ có tin nhắn và email thông báo sau khi quá trình xử lý hoàn tất, vui lòng kiểm tra kỹ.</li>
              <li>Nếu xác minh không thành công, bạn phải chờ 3 ngày kể từ lúc xác minh thất bại mới có thể gửi yêu cầu xác minh lần kế tiếp.</li>
            </div>
          </div>
          <div class="td-load-verify">
         <?=$AccountVerifier->TD();?>
         </div>
        </div>
      </div>
    </div>
  </div>