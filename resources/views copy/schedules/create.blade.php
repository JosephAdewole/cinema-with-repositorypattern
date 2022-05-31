<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule a Movie Showtime') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form data-action="{{ url('api/schedules') }}" method="post" id= 'create-schedule-form'>
                        @csrf
                        <label for="">Showtime</label>
                        <input required type="datetime-local" class="form-control" name="showtime">
                        <label for="">Movies</label>
                        <select required class="form-control" name="movie_id" id="movielist">
                        </select>
                        <label for="">Cinemas</label>
                        <select required class="form-control" name="cinema_id" id="cinemalist">
                        </select>
                        <input type="submit" class="btn btn-dark" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $.ajax({
                url: '/api/cinemas',
                method: 'GET',
                dataType: 'JSON',                
                success:function(response)
                {
                    console.log(response.data)
                    res = response.data
                    var len = response.data.length;
                    var ul_str = "";
                    for(var i=0; i<len; i++){
                        var id = res[i].id;
                        var name = res[i].name;
                        ul_str += "<option class='row' value='" + id + "'>" + name + "</option>";
                       
                    }
                    $("#cinemalist").append(ul_str);

                },
                error: function(response) {
                }
            });

            $.ajax({
                url: '/api/movies',
                method: 'GET',
                dataType: 'JSON',                
                success:function(response)
                {
                    console.log(response.data)
                    res = response.data
                    var len = response.data.length;
                    var movie_ul_str = "";
                    for(var i=0; i<len; i++){
                        var id = res[i].id;
                        var name = res[i].name;
                        movie_ul_str += "<option class='row' value='" + id + "'>" + name + "</option>";
                       
                    }
                    $("#movielist").append(movie_ul_str);

                },
                error: function(response) {
                }
            });

        var form = '#create-schedule-form';

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
                    alert('Schedule Successfully created')
                },
                error: function(response) {
                }
            });
        });

        });
    </script>
</x-app-layout>
