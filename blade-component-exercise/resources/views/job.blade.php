@php use Illuminate\Support\Arr; @endphp

<div>
    <x-nav-bar>
        <x-slot:heading>
            <h1>Jobs</h1>
        </x-slot:heading>
    </x-nav-bar>
    @foreach($jobs as $job)
            <p><a href="job-details/{{ $job['id'] }}" class="no-underline text-black hover:bg-blue-50">
                    {{ $job['id'] }}.{{ $job['title'] }}
                </a></p>
    @endforeach
</div>
