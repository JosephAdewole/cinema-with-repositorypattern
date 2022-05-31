<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div id='movies' class="row">

        </div>
    </div>
    
    
    


    <script>
        $(document).ready(function(){
            $.ajax({
                url: 'api/movies',
                method: 'GET',
                dataType: 'JSON',                
                success:function(response)
                {
                    console.log(response.data)
                    res = response.data
                    var len = response.data.length;
                    for(var i=0; i<len; i++){
                        // console.log(res[i].schedules[0].showtime)
                        var id = response.data[i].id;
                        var name = response.data[i].name;
                        var created_at = response.data[i].created_at;

                        var tr_str = "<div class='row card border border-primary' id = 'singlemovie'> " +
                            "<p align='center'>" + name + "</p>" +
                            "<a style='text-align:center' href='movies/" + id + "'> <span>View</span></a> </div>";

                        $("#movies").append(tr_str);

                        var cinemas_length = response.data[i].cinemas.length;
                        for (var j = 0; j < cinemas_length; j++) {
                            console.log(res[i].schedules[0].showtime)

                            const thiscinemas = response.data[i].cinemas[j];
                            var cn_str = "<br><br><div class='row border-left border-primary' id = 'singlemovie'> " +
                            "<p align='center'>" + thiscinemas.name + "</p></div>";
                            $("#movies").append(cn_str);

                        }
                    }
                },
                error: function(response) {
                }
            });
        var form = '#view-form';

        $(form).on('submit', function(event){
            event.preventDefault();

            var url = $(this).attr('data-action');
            console.log(url);
            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(response)
                {
                    $(form).trigger("reset");
                    alert('Successfully created')
                },
                error: function(response) {
                }
            });
        });

        });
    </script>
</x-app-layout>
