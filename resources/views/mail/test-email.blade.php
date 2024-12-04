<p>{{ $name }}</p>
<p>Wants to contact you about {{ $subject }}</p>
<p>Message:</p>
<p>{{ is_string($message) ? $message : '' }}</p>
