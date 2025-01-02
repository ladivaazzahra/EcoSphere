<script type="text/javascript">
    
    function confirmation(ev)
    {
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');

        console.log(urlToRedirect);

        swal({

            title:"Are You Sure to Delete This",
            text: "This delete will be permanent",
            icon:"warning",
            buttons: true,
            dangerMode:true,
        })

        .then((willCancel)=>{

          if(willCancel)
        {
            window.location.href=urlToRedirect;
        }  
        });
    }