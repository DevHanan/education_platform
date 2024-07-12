<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  @if(isset($title))
  {{ $title }} -
  @endif
  {{ $setting->title }}</title>
  <link rel="shortcut icon" href="{{ asset($setting->iconFullPath) }}">

    <link rel="stylesheet" href="{{asset('public/front/css/bootstrap.min.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!--animation-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('public/front/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/media.css')}}">
</head>
<script>
    function checkAll(filterClass) {
        // Get the "Check All" checkbox and all other checkboxes
        const checkAllCheckbox = document.querySelector(`.${filterClass} #checkAll`);
        const checkboxes = document.querySelectorAll(`.${filterClass} .form-check-input:not(.check-all)`);

        // Add event listener to the "Check All" checkbox
        checkAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = checkAllCheckbox.checked;
            });
        });

        // Add event listener to other checkboxes to uncheck "Check All" if any checkbox is unchecked
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (!this.checked) {
                    checkAllCheckbox.checked = false;
                }
            });
        });
        
    }
</script>

