<div class="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Image Editor') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6">
        <div class="flex flex-col justify-center items-center gap-12 p-6 bg-white overflow-hidden rounded-xl">
            <div class="h-[600px] w-full" id="editor-container"></div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{asset('plugins/pixie/dist/pixie.umd.js')}}"></script>
<script>
    var pixie = new Pixie({
        selector: "#editor-container",
        crossOrigin: true,
        baseUrl: '/plugins/pixie/assets',
        image: "{{asset('storage/' . $image->path)}}",

        onSave: async function(data, name) {
            const state = pixie.getState();

            axios.post("{{route('slideshow.image.save')}}", {
                data,
                image_id: '{{$image->id}}'
            })
            .then(function ({data}) {
                if(data.success){
                    window.location.href = '/slideshow/edit';
                }
                console.log(data.success);
            })
            .catch(function (error) {
                console.log(error.message);
            });
        },
    });
</script>
@endpush