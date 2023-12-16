<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <title>Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo2/style.css') }}">
    <!-- End layout styles -->
    
    {{-- fixed colum --}}
    <style>
    .table-responsive {
        overflow-x: auto;
        max-width: 100%;
    }
    .fixed-column {
        position: sticky;
        right: 0;
        z-index: 1;
        background-color: #060c17 !important;
        z-index: 1;
    }
    form {
        margin-top: 10px;
    } 
    </style>
    {{-- <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" /> --}}
</head>

<body>
    <div class="main-wrapper">

        <!-- Sidebar -->
        @include('admin.body.header')
        <!-- partial -->
        <div class="page-wrapper">
            <!-- Navbar -->
            @include('admin.body.navbar')

            <!-- Content -->
            @yield('content')

            <!-- Footer -->
            @include('admin.body.footer')

        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard-dark.js') }}"></script>
    <!-- End custom js for this page -->


    {{-- Form swat alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                CKEDITOR.replace('desc_edit');
                CKEDITOR.replace('content_edit');
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
        <script>
            $(document).ready(function() {
               
                $("#choose_category").change(function() {
                    var category_id = $(this).val();
                    // console.log(category_id);
                    if (category_id == '0') {
                        alert('Vui lòng chọn danh mục game!');
                    } else {
                        (async () => {
                            const rawResponse = await fetch(`http://127.0.0.1:8000/api/choose-category?category_id=${category_id}`, {
                                method: 'GET',
                                headers: {
                                    'Accept': 'application/json',
                                    'Content-Type': 'application/json',
                                },
                            });
                            const content = await rawResponse.json();
                            console.log(content.result)
                            $('#attribute').html(content.result) 
                            })();
                    }
                });

            });
        </script>
        

        {{-- Tạo slug tự động --}}
        <script type="text/javascript">
            function ChangeToSlug() {
                var slug;
                //Lấy text từ thẻ input title 
                slug = document.getElementById("title").value;
                slug = slug.toLowerCase();
                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
                document.getElementById('convert_slug').value = slug;
            }
        </script>
        <script type="text/javascript">
            function shuffle(array) {
            var currentIndex = array.length,
                randomIndex;

            // While there remain elements to shuffle...
            while (0 !== currentIndex) {
                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex--;

                // And swap it with the current element.
                [array[currentIndex], array[randomIndex]] = [
                array[randomIndex],
                array[currentIndex],
                ];
            }

            return array;
            }

            function Spin_Wheel() {
            
            document.getElementById("marker_click").setAttribute('onclick','return false');
            document.getElementById("marker_style").style.opacity = "0.8";
            var path_wheel = "{{ URL::asset('backend/wheel/wheelmusic.mp3') }}";
            var path_applause = "{{ URL::asset('backend/wheel/applause.mp3') }}";
            var wheel_music = new Audio(path_wheel); 
            var applause_music = new Audio(path_applause); 
            wheel_music.play();

            const wheel = document.querySelector('.wheel');
            const marker = document.querySelector('.marker');
            let SelectedItem = "";

            let nick50tuong = shuffle([2115, 2475, 2825]);
            let qhngaunhien = shuffle([2070, 2430, 2780]);
            let tang99k = shuffle([2025, 2385, 2735]);
            let nickrandom = shuffle([1980, 2340, 2690]);
            let nick99tuong = shuffle([1935, 2295, 2645]);
            let nickfulltuong = shuffle([1890, 2250, 2600]);
            let nick10tuong = shuffle([1845, 2205, 2565]);
            let nick100tuong = shuffle([1800, 2160, 2520]);

            let Random = shuffle([
                nick50tuong[0],
                qhngaunhien[0],
                tang99k[0],
                nickrandom[0],
                nick99tuong[0],
                nickfulltuong[0],
                nick10tuong[0],
                nick100tuong[0],
            ]);
            if (nick50tuong.includes(Random[0])) SelectedItem = "Nick 50 tướng";
            if (qhngaunhien.includes(Random[0])) SelectedItem = "500 quân huy";
            if (tang99k.includes(Random[0])) SelectedItem = "99k";
            if (nickrandom.includes(Random[0])) SelectedItem = "Nick random";
            if (nick99tuong.includes(Random[0])) SelectedItem = "Nick 99 tướng";
            if (nickfulltuong.includes(Random[0])) SelectedItem = "Nick full tướng";
            if (nick10tuong.includes(Random[0])) SelectedItem = "Nick 10 tướng";
            if (nick100tuong.includes(Random[0])) SelectedItem = "Nick 100 tướng";

            wheel.style.transition = "all 5s ease";
            wheel.style.transform = `rotate(${Random[0]}deg)`;
            // wheel.style.transform = "rotate(360deg)";

            setTimeout(function () {
                applause_music.play();
                swal('Chúc mừng bạn','Đã trúng ' + SelectedItem + '.','success');
            }, 5500);

            setTimeout(function () {
                wheel.style.setProperty("transition", "initial");
                wheel.style.transform = "rotate(360deg)";
                document.getElementById("marker_click").setAttribute('onclick','return Spin_Wheel()');
            }, 6000);
            }
        </script>
</body>
</html>
