<p>{{ $status }}</p>
@if (session('user_feedback'))
    @if (session('user_feedback')['course'] === 'php_track')
        <?php $course = 'PHP Track'; ?>
    @elseif (session('user_feedback')['course'] === 'javascript_track')
        <?php $course = 'Javascript Track'; ?>
    @elseif (session('user_feedback')['course'] === 'html_css')
        <?php $course = 'HTML & CSS'; ?>
    @endif
    <h1>Submitted Entry</h1>
    <div>Name: {{ session('user_feedback')['name'] }}</div>
    <div>Course: {{ $course }}</div>
    <div>Score: {{ session('user_feedback')['score'] }}pts</div>
    <div>Reason: {{ session('user_feedback')['reason'] }}</div>
    <button><a href="{{ url()->previous() }}">Return</a></button>
@endif
