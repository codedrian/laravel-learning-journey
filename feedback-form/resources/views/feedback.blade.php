@if (session('feedback'))
    @if (session('feedback')['course'] === 'php_track')
        <?php $course = 'PHP Track'; ?>
    @elseif (session('feedback')['course'] === 'javascript_track')
        <?php $course = 'Javascript Track'; ?>
    @elseif (session('feedback')['course'] === 'html_css')
        <?php $course = 'HTML & CSS'; ?>
    @endif
    <h1>Submitted Entry</h1>
    <div>Name: {{ session('feedback')['name'] }}</div>
    <div>Course: {{ $course }}</div>
    <div>Score: {{ session('feedback')['score'] }}pts</div>
    <div>Reason: {{ session('feedback')['reason'] }}</div>
    <button><a href="{{ url()->previous() }}">Return</a></button>
@endif
