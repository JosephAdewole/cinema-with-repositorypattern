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
        <div style="visibility: hidden" >
            <div id="iddata">
                /api/movies/{{$movieId}}
            </div>
            <form action="get" id="movieid">
                <input type="hidden" name="id" value="{{$movieId}}">
                <input type="submit">
            </form>
        </div>
        <div id='singlemovie' class="row">

        </div>
    </div>
    
    
    


    <script>
        $(document).ready(function(){
            url = document.getElementById('iddata').innerHTML;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'JSON',                
                success:function(response)
                {
                    console.log(response)
                    var id = response.data.id;
                    var name = response.data.name;
                    var created_at = response.data.created_at;

                    var tr_str = "<div class='col border border-primary'> " +
                        "<p align='center'>" + name + "</p> </div>";
                    $("#singlemovie").append(tr_str);
                    
                },
                error: function(response) {
                }
            });
        });
    </script>
</x-app-layout>
