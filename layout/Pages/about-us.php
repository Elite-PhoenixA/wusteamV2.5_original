<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php $options_header = ['title' => "Về Chúng Tôi - " . $TD->Setting('name-site'), 'description' => 'Chúng tôi là ai? địa chỉ trang web của chúng tôi là https://'.$domain.'',];?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<style>.title-theme{padding:0 0 0 45px!important;background:url('/<?=__IMG__?>/svg/cat.svg') 10px center/30px 20px no-repeat;color:#566889}.title-theme:before{display:none}</style>
<main class="container">
  <div class="content-wrap">
    <div class="content-layout">
      <article class="article page-article main-bg theme-box box-body radius8 main-shadow">
        <div class="theme-posts-content">
          <h2 data-color="#ef0c7e" class="title-theme" style="--theme-color:#ef0c7e">Bình Luận
          </h2>
          <p>Khi khách truy cập và để lại nhận xét, chúng tôi sẽ thu thập dữ liệu hiển thị trong biểu mẫu bình luận cũng như địa chỉ IP của khách truy cập và User-Agent String trình duyệt để giúp phát hiện thư rác (spamer).
          </p>
          <h2 data-color="#ef0c7e" class="title-theme" style="--theme-color:#ef0c7e">Phương Tiện Truyền Thông
          </h2>
          <p>Nếu bạn tải hình ảnh lên trang web này, bạn nên tránh tải lên những hình ảnh có nhúng thông tin vị trí địa lý (EXIF GPS). Khách truy cập vào trang web này sẽ có thể tải xuống và trích xuất thông tin vị trí từ hình ảnh trên trang web này.
          </p>
          <h2 data-color="#ef0c7e" class="title-theme" style="--theme-color:#ef0c7e">Cookies
          </h2>
          <p>Nếu bạn để lại nhận xét trên trang web của chúng tôi, bạn có thể chọn tham gia lưu tên, địa chỉ email và địa chỉ trang web của mình vào cookie. Điều này là để thuận tiện cho bạn bằng cách không phải điền lại các trường liên quan khi bạn bình luận. Những cookie này sẽ tồn tại trong một năm.
          </p>
          <p>Nếu bạn truy cập trang đăng nhập của chúng tôi, chúng tôi sẽ đặt cookie tạm thời để xác nhận xem trình duyệt của bạn có chấp nhận cookie hay không. Cookie này không chứa dữ liệu cá nhân và bị loại bỏ khi bạn đóng trình duyệt.
          </p>
          <p>Khi bạn đăng nhập, chúng tôi cũng sẽ thiết lập nhiều cookie để lưu thông tin đăng nhập và tùy chọn hiển thị màn hình của bạn. Cookie đăng nhập tồn tại trong 30 ngày và cookie phiên tồn tại trong 7 ngày. Nếu bạn chọn "Ghi nhớ tôi", bạn sẽ duy trì trạng thái đăng nhập trong 7 ngày. Nếu bạn đăng xuất khỏi tài khoản của mình, cookie dùng để đăng nhập sẽ bị xóa.
          </p>
          <p>Về cookie phiên, chúng tôi đã mã hoá bằng thuật toán AES (mã hóa đối xứng) và key giải mã đã được lưu trữ trên hệ thống của chúng tôi và luôn tự động thay đổi liên tục, tránh bị (hacker) khai thác và chiếm quyền đăng nhập vào tài khoản của bạn.
          </p>
          <p>Nếu bạn chỉnh sửa hoặc xuất bản một bài viết, chúng tôi sẽ lưu một cookie bổ sung trong trình duyệt của bạn. Cookie này không chứa dữ liệu cá nhân và chỉ ghi lại ID của bài viết bạn vừa chỉnh sửa. Cookie này sẽ vẫn có sẵn trong một ngày.
          </p>
          <h2 data-color="#ef0c7e" class="title-theme" style="--theme-color:#ef0c7e">Nội Dung Được Nhúng
          </h2>
          <p>Các bài viết trên trang này có thể chứa nội dung được nhúng (ví dụ: video, hình ảnh, bài viết, v.v.). Nội dung được nhúng từ các trang web khác hoạt động không khác nếu bạn truy cập trực tiếp vào các trang web khác đó.
          </p>
          <p>Các trang web này có thể thu thập dữ liệu về bạn, sử dụng cookie, nhúng tính năng theo dõi bổ sung của bên thứ ba và giám sát sự tương tác của bạn với nội dung được nhúng đó, bao gồm cả việc theo dõi bạn và nội dung được nhúng nếu bạn có tài khoản và đăng nhập vào trang web đó.
          </p>
          <h2 data-color="#ef0c7e" class="title-theme" style="--theme-color:#ef0c7e">Chúng Tôi Lưu Giữ Thông Tin Của Bạn Trong Bao Lâu
          </h2>
          <p>Nếu bạn để lại bình luận, bình luận đó sẽ được siêu dữ liệu của chúng tôi lưu trữ vô thời hạn. Chúng tôi làm điều này để mọi nhận xét tiếp theo có thể được nhận dạng và phê duyệt tự động thay vì giữ chúng trong hàng đợi kiểm duyệt.
          </p>
          <p>Đối với người dùng đã đăng ký của trang web này, chúng tôi cũng lưu trữ thông tin cá nhân do người dùng cung cấp trong hồ sơ của họ. Tất cả người dùng có thể xem, chỉnh sửa hoặc xóa thông tin cá nhân của mình bất kỳ lúc nào (ngoại trừ họ không thể thay đổi tên người dùng của mình) và quản trị viên trang cũng có thể xem và chỉnh sửa thông tin đó.
          </p>
          <h2 data-color="#ef0c7e" class="title-theme" style="--theme-color:#ef0c7e">Bảo Vệ Trẻ Vị Thành Niên
          </h2>
          <p>
            <strong>Trang chúng tôi
            </strong> rất coi trọng việc bảo vệ trẻ vị thành niên và cam kết thực hiện trách nhiệm của mình.
          </p>
          <p>Nếu bạn là trẻ vị thành niên, trước tiên bạn phải được sự đồng ý của người giám hộ, sau đó sử dụng và gửi thông tin cá nhân với sự đồng ý và hướng dẫn của người giám hộ.
          </p>
          <p>Nếu bạn là trẻ em dưới 14 tuổi, trước khi sử dụng dịch vụ của chúng tôi, vui lòng xin phép người giám hộ của bạn và sử dụng nền tảng của chúng tôi dưới sự hướng dẫn của người giám hộ.
          </p>
          <p>Đối với việc sử dụng các sản phẩm và/hoặc dịch vụ của chúng tôi với sự đồng ý của người giám hộ, chúng tôi sẽ chỉ thu thập, sử dụng, chia sẻ, chuyển giao hoặc tiết lộ công khai chúng khi được pháp luật và quy định cho phép, với sự đồng ý rõ ràng của người giám hộ hoặc khi cần thiết để bảo vệ trẻ vị thành niên.
          </p>
          <h2 data-color="#ef0c7e" class="title-theme" style="--theme-color:#ef0c7e">Liên Hệ Chúng Tôi
          </h2>
          <p>Nếu bạn có bất kỳ khiếu nại, đề xuất hoặc câu hỏi nào về việc thực hiện chính sách này hoặc các vấn đề liên quan đến bảo vệ quyền riêng tư của chúng tôi, bạn có thể liên hệ với chúng tôi qua các phương pháp sau và chúng tôi sẽ trả lời bạn trong vòng 1 ngày làm việc sau khi thấy khiếu nại của bạn:
          </p>
          <p>Liên hệ: 
            <strong><a href="<?=$TD->Setting('zalo')?>"><?=$TD->Setting('zalo')?></a></strong>
          </p>
        </div>
      </article>
    </div>
  </div>
  <div class="sidebar"></div>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>