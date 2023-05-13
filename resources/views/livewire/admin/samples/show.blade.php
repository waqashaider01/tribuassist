@section('page_name', 'Sample Details')

<div class="bg-white sm:p-8 space-y-8">
    <table class="w-full border table-responsive">
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Title</th>
            <td>{{$sample->title}}</td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Type</th>
            <td>
                {{$sample->type == 1 ? 'Video Style' : ''}}
                {{$sample->type == 2 ? 'Tribute Theme' : ''}}
                {{$sample->type == 3 ? 'Background Music' : ''}}
                {{$sample->type == 4 ? 'DVD Package Theme' : ''}}
            </td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Preview</th>
            <td>
                @if($sample->type <= 2) <video controls>
                    <source src="{{asset('storage/' . $sample->path)}}" type="video/mp4">
                    </video>
                    @elseif($sample->type == 3)
                    <audio controls src="{{asset('storage/' . $sample->path)}}"></audio>
                    @else
                    <img class="h-56" src="{{asset('storage/' . $sample->path)}}">
                    @endif
            </td>
        </tr>
    </table>
</div>