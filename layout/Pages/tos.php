<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php $options_header = ['title' => "Chính Sách Bảo Mật - " . $TD->Setting('name-site'), 'description' => 'Chào mừng bạn đến với việc đăng ký và trở thành người dùng của trang web này. Vui lòng đọc kỹ Thỏa thuận dịch vụ người dùng sau đây trước khi đăng ký: Nếu bạn có bất kỳ ý kiến nào về bất kỳ điều khoản nào trong thỏa thuận này, bạn có thể từ chối đăng ký trở thành người dùng của trang web này ngay lập tức. Nếu bạn sử dụng tài khoản để đăng nhập vào trang web này, điều đó có nghĩa là bạn hoàn toàn chấp nhận tất cả các điều khoản theo thỏa thuận này. Khi bạn đăng ký, điều đó có nghĩa là bạn đã đọc, hiểu và chấp nhận toàn bộ nội dung dưới thỏa thuận này.',];?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<style>.title-theme{padding:0 0 0 45px!important;background:url('/<?=__IMG__?>/svg/cat.svg') 10px center/30px 20px no-repeat;color:#566889}.title-theme:before{display:none}</style>
<main class="container">
    <div class="content-wrap">
        <div class="content-layout">
            <article class="article page-article main-bg theme-box box-body radius8 main-shadow">
                <div class="theme-posts-content">
                    <h2 class="title-theme">Chính Sách Bảo Mật</h2>
                    <ul>
                        <li>Chúng tôi tự hào là một trong những dịch vụ tôn trọng quyền riêng tư nhất hiện có, đồng thời
                            là một trong những dịch vụ an toàn nhất.</li>
                        <li>Chúng tôi không lưu giữ bất kỳ logs IP nào, và chúng tôi không xâm phạm quyền riêng tư của
                            bạn bằng hệ thống theo dõi, keylogger.
                        </li>
                        <li>Mật khẩu được hash và thêm salted và mọi thứ đều được mã hóa nhằm đảm bảo quyền riêng tư
                            và bảo mật.
                        </li>
                        <li><u>Ngoài ra, chúng tôi chưa bao giờ xâm phạm hoặc rò rỉ thông tin của khách hàng bất kỳ hình thức
                                nào.</u>
                        </li>
                    </ul>
                    <h2 class="title-theme">Điều Khoản Điều Kiện</h2>
                    <ul>
                        <li>Chúng tôi sẽ hỗ trợ bạn khôi phục tài khoản, nếu tài khoản bạn quên mật khẩu/bị hack.</li>
                        <li>Người dùng chỉ được phép tạo tối đa một tài khoản duy nhất.</li>
                        <li>Mỗi địa chỉ IP/Email chỉ được liên kết với một tài khoản duy nhất, việc sử dụng 1 IP/Email tạo nhiều tài
                            khoản sẽ bị ngăn cấm.</li>
                        <li>Chỉ chấp nhận họ và tên pháp lý, tên có chứa các mã độc hại (html, js, css, query...) nhầm
                            mục đính khai thác/tấn công website sẽ bị chặn ngay lập tức.</li>
                    </ul>
                    <h2 class="title-theme">Chấm Dứt Tài Khoản</h2>
                    <ul>
                        <li>Bất kỳ vi phạm nào của chính sách đăng ký và sử dụng tài khoản sẽ dẫn đến hạn chế, bao gồm cả việc cấm tài khoản vĩnh viễn & blacklist ip.</li>
                        <li>Hệ thống banned/blacklist của chúng tôi hoàn toàn được kiểm tra trước khi cấm tài khoản, việc ban lệnh cấm vào tài khoản điều có lý do và mục đích.</li>
                        <li>Nếu bạn cho rằng bạn đã chấp hành và tuân thủ các chính sách và điều khoản, nhưng tài khoản của bạn vẫn bị cấm, bạn có thể liên hệ cho chúng tôi và gửi các bằng chứng thuyết phục bạn cho rằng chúng tôi chấm dứt tài khoản của bạn là nhầm lẫn.</li>
                    </ul>
                    <h2 class="title-theme">Tuyên Bố Miễn Trừ Trách Nhiệm</h2>
                    <ul>
                        <li> Mặc dù chúng tôi cố gắng đảm bảo rằng mọi thông tin chúng tôi cung cấp là chính xác, chúng tôi không bảo đảm tính chính xác hoặc đầy đủ của bất kỳ và tất cả tài liệu trên Dịch vụ của chúng tôi.</li>
                        <li>Chúng tôi có thể thay đổi thông tin, sản phẩm và giá cả trên Dịch vụ của chúng tôi bất kỳ lúc nào mà không cần thông báo trước.</li>
                </ul>
                <h2 class="title-theme">Quan Trọng</h2>
                    <ul>
                        <li>Bất kỳ hành vi xúc phạm nào đối với người quản trị hoặc thành viên sẽ dẫn đến việc chấm dứt tài khoản.</li>
                        <li>Nếu phát hiện bạn cố tình khai thác, hoặc phá hoại bất kỳ hệ thống của <?=$TD->Setting('name-site')?> nào, tài khoản của bạn sẽ bị đình chỉ.</li>
                    <li>Bạn không được phép thiếu tôn trọng bất kỳ nhân viên hoặc quản trị viên của <?=$TD->Setting('name-site')?>.</li>
                    <li>Bạn không được phép chia sẻ thông tin tài khoản của mình với người dùng khác.</li>
                    <li>Không <b>Hoàn Tiền</b> bất kể hình thức nào khi đã thanh toán trên dịch vụ của chúng tôi.</li>
                </ul>
                </div>
            </article>
        </div>
    </div>
    <div class="sidebar"></div>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>