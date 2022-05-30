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

                    var len = response.data.length;
                    for(var i=0; i<len; i++){
                        var id = response.data[i].id;
                        var name = response.data[i].name;
                        var created_at = response.data[i].created_at;

                        var tr_str = "<div class='col border border-primary '> " +
                            "<p align='center'>" + name + "</p>" +
                            "<p align='center'>" + created_at + "</p> </div>";
                        $("#movies").append(tr_str);
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
