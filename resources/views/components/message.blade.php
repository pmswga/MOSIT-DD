@switch($type)
@case('error')
    <div class="ui icon red message">
    <i class="exclamation circle icon"></i>
    @break
@case('message')
    <div class="ui icon blue message">
    <i class="info circle icon"></i>
    @break
@case('success')
    <div class="ui icon success message">
    <i class="info circle icon"></i>
    @break
@endswitch
    <div class="content">
        <div class="header">
            {{ $message  }}
        </div>
    </div>
</div>
