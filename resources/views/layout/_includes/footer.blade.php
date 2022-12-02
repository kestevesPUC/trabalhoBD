<!-- Compiled and minified JavaScript -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">



    $(document).ready(function() {

        $('.sidenav').sidenav();
        $('#btn_fadeinput').on('click', function(){

        if($('#criar_btn').is(":visible")) {
            $('#login-btn').show();
        }else{
            $('#login-btn').hide();
        }
            $('#inpt_nome').fadeToggle();
            $('#inpt_email').fadeToggle();
            $('#inpt_senha').fadeToggle();
            $('#password_confirm').fadeToggle();
            $('#dv_CriarUsuario_fade').fadeToggle();
            $('#criar_btn').fadeToggle();

        });

        $('#login-btn').on('click', function () {
                $.ajax({
                    url: route('site.login.entrar'),
                    type: 'POST',
                    dataType: 'json',
                    data:{
                    email: $('#email').val(),
                    senha: $('#senha').val()
                },success: function(returnRota){
                    if (returnRota.success) {
                        window.location.href = route('admin.cursos.lista');

                    } else {

                        alert(returnRota.message);
                        window.location.href = route('#');
                    }
                }
            })
        });








        // $(".button-collapse").sideNav();

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
    });
</script>

</body>

</html>
