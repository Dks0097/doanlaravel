@extends('layouts.master')
@section('css')
<title>Laravel </title>
<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/source/assets/dest/css/font-awesome.min.css">
<link rel="stylesheet" href="/source/assets/dest/vendors/colorbox/example3/colorbox.css">
<link rel="stylesheet" href="/source/assets/dest/rs-plugin/css/settings.css">
<link rel="stylesheet" href="/source/assets/dest/rs-plugin/css/responsive.css">
<link rel="stylesheet" title="style" href="/source/assets/dest/css/style.css">
<link rel="stylesheet" href="/source/assets/dest/css/animate.css">
<link rel="stylesheet" title="style" href="/source/assets/dest/css/huong-style.css">
@endsection
@section('content')
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1618.8014533377982!2d108.72233780001713!3d15.203290155474345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1686630203674!5m2!1svi!2s" 
    
width="1500" height="450" style="border:0;" allow="fullscreen" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection
@section('js')

<script src="/source//source/assets/dest/js/custom2.js"></script>
<script>
$(document).ready(function($) {    
    $(window).scroll(function(){
        if($(this).scrollTop()>150){
        $(".header-bottom").addClass('fixNav')
        }else{
            $(".header-bottom").removeClass('fixNav')
        }}
    )
})
</script>
<script>
    $(document).ready(function(){
        var active = location.search;
        $('#select-filter option[value="'+active+'"]').attr('selected','selected');
    })

    $('.select-filter').change(function(){
        var value = $(this).find(':selected').val();
        // alert(value);

        if(value !=0) {
            var url = value;
            window.location.replace(url)

        }
        else {
            alert('hãy lọc')
        }


    })

</script>
@endsection
