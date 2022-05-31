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
                    <div id='movies' class="row border">
                    </div>
                </div>
            </div>
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
                        // console.log(res[i].cinemas)
                        var id = response.data[i].id;
                        var name = response.data[i].name;
                        var created_at = response.data[i].created_at;

                        var tr_str = "<div class='row' id = 'singlemovie'> " +
                            "<h3 align='center'>Movie: " + name + "</h3></div>";

                        $("#movies").append(tr_str);
                        var extra_text = "<h4 align='center'>Below are Showtimes</h4>";
                        $("#movies").append(extra_text);

                        var cinemas_length = response.data[i].cinemas.length;
                        for (var j = 0; j < cinemas_length; j++) {
                            const thiscinemas = response.data[i].cinemas[j];
                            var cn_str = "<br><br><div class='row' id = 'singlemovie'> " +
                            "<p align='center'>" + thiscinemas.name + "</p></div>";
                            $("#movies").append(cn_str);
                            var schedule = response.data[i].schedules[j].showtime;
                            var schedule_str = "<br><br><div class='row' id = 'schedule'> " +
                            "<p align='center'>" + schedule + "</p></div>";
                            $("#movies").append(schedule_str);
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
