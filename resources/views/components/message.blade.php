@switch($type)
@case('error')
    <div class="ui icon red message">
    <i class="exclamation triangle icon"></i>
    @break
@case('warning')
    <div class="ui icon orange message">
    <i class="exclamation circle icon"></i>
    @break
@case('info')
    <div class="ui icon blue message">
    <i class="info circle icon"></i>
    @break
@case('success')
    <div class="ui icon success message">
    <i class="check circle icon"></i>
    @break
@default
    <div class="ui icon message">
@endswitch
    <div class="content">
        <div class="header">
            {{ $message  }}
        </div>
    </div>
</div>
