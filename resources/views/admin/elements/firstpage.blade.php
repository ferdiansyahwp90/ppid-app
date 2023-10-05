<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <title>Dashboard Admin</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/logo.jpg" rel="icon">
        <link href="{{ asset('pageUsers/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
         <!-- Google Fonts -->
         <link href="https://fonts.gstatic.com" rel="preconnect">
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('pageUsers/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">


        

        <!-- Template Main CSS File -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <!-- Template Main CSS File -->
        <link href="{{ asset('pageUsers/assets/css/style.css') }}" rel="stylesheet">

        <!-- Trix -->
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

        <!-- Tinymce -->
        <script src="{{asset('js/tinymce/tinymce/tinymce.js')}}"></script>
        content_css: 'css/content.css',

    </head>
    <body>

        <!-- Header -->
            @include('admin.elements.header');
        <!-- End Header -->

        <!-- Navbar -->
            @include('admin.elements.navbar');
        <!-- End Navbar -->

        <!-- Content -->
            @yield('content')
        <!-- End Content -->

        <!-- Footer -->
            @include('admin.elements.footer');
        <!-- End Footer -->

        <!-- Vendor JS Files -->
        {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="assets/lib/wow/wow.min.js"></script> --}}
        <script src="{{ asset('pageUsers/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/chart.js/chart.umd.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/echarts/echarts.min.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/quill/quill.min.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/settings/style.css') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('pageUsers/assets/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>flatpickr("input[type=datetime-local]", {})</script>

        <!-- Tinymce -->
            <script>
                var editor_config = {
                  path_absolute : "/",
                  selector: 'textarea#deskripsi',
                  relative_urls: true,
                  plugins: ['advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak','searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime','media', 'table', 'emoticons', 'template', 'help'],
                    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',
                    menu: {favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }},
                    menubar: 'favs file edit view insert format tools table help',
                  file_picker_callback : function(callback, value, meta) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
              
                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                      cmsURL = cmsURL + "&type=Images";
                    } else {
                      cmsURL = cmsURL + "&type=Files";
                    }
              
                    tinyMCE.activeEditor.windowManager.openUrl({
                      url : cmsURL,
                      title : 'Filemanager',
                      width : x * 0.8,
                      height : y * 0.8,
                      resizable : "yes",
                      close_previous : "no",
                      onMessage: (api, message) => {
                        callback(message.content);
                      }
                    });
                  }
                };
              
                tinymce.init(editor_config);
            </script>
          
            <!-- Setting -->
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
            <link href = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">


    </body>
</html>