<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View All Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form data-action="{{ url('api/movies') }}" method="post" id= 'view-form'>
                        @csrf
                        <label for="">Enter you movie name here</label>
                        <input type="text" class="form-control" name="name" required>
                        <input type="submit" class="btn btn-dark" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

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
