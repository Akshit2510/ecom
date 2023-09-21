
<style>
    .alert {
    position: fixed;
    right: 1%;
    top: 59px;
    z-index: 9999;
    width: 98%;
    max-width: 450px;
    box-shadow: 0px 0px 40px -12px #000;
}

.alert .alert-close {
    float: right;
    position: absolute;
    right: 10px;
    top: 10px;
}

.alert .alert-close button.close {
    background: transparent;
    border: 0px;
}

.alert .alert-close button.close svg path {
    fill: #fff;
}

.alert .alert-text {
    float: left;
    padding-right: 45px;
    width: 100%;
    font-weight: bold;
}
</style>
@if($errors->any())
@elseif(session()->get('flash_success'))
<div class="alert alert-success w-50" style="margin:0 0 1% 14%" role="alert">     
    <div class="alert-text">        
    @if(is_array(json_decode(session()->get('flash_success'), true)))
        {{ implode('', session()->get('flash_success')->all(':message<br/>')) }}
    @else
        {{ session()->get('flash_success') }}
    @endif
    </div>    
    <div class="alert-close">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span class="svg-icon svg-icon-primary svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                        <rect x="0" y="7" width="16" height="2" rx="1"/>
                        <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                    </g>
                </g>
            </svg></span>
        </button>
    </div>
</div>
@elseif(session()->get('flash_warning'))
<div class="alert alert-warning w-50" style="margin:0 0 1% 14%" role="alert">    
    <div class="alert-text">        
        @if(is_array(json_decode(session()->get('flash_warning'), true)))
            {{ implode('', session()->get('flash_warning')->all(':message<br/>')) }}
        @else
            {{ session()->get('flash_warning') }}
        @endif    
        </div>        
        <div class="alert-close">
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span class="svg-icon svg-icon-primary svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                        <rect x="0" y="7" width="16" height="2" rx="1"/>
                        <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                    </g>
                </g>
            </svg></span>
            </button>
        </div>
</div>
@elseif(session()->get('flash_info'))
<div class="alert alert-info w-50" style="margin:0 0 1% 14%" role="alert">
<div class="alert-text">        
        @if(is_array(json_decode(session()->get('flash_info'), true)))
            {{ implode('', session()->get('flash_info')->all(':message<br/>')) }}
        @else
            {{ session()->get('flash_info') }}
        @endif    
        </div>        
        <div class="alert-close">
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span class="svg-icon svg-icon-primary svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                        <rect x="0" y="7" width="16" height="2" rx="1"/>
                        <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                    </g>
                </g>
            </svg></span>
            </button>
        </div> 
</div>
@elseif(session()->get('flash_danger'))
<div class="alert alert-danger w-50" style="margin:0 0 1% 14%" role="alert">
<div class="alert-text">        
        @if(is_array(json_decode(session()->get('flash_danger'), true)))
            {{ implode('', session()->get('flash_danger')->all(':message<br/>')) }}
        @else
            {{ session()->get('flash_danger') }}
        @endif    
        </div>        
        <div class="alert-close">
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span class="svg-icon svg-icon-primary svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                        <rect x="0" y="7" width="16" height="2" rx="1"/>
                        <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                    </g>
                </g>
            </svg></span>
            </button>
        </div>
</div>
@elseif(session()->get('flash_message'))
<div class="alert alert-info w-50" style="margin:0 0 1% 14%" role="alert">
<div class="alert-text">        
        @if(is_array(json_decode(session()->get('flash_message'), true)))
            {{ implode('', session()->get('flash_message')->all(':message<br/>')) }}
        @else
            {{ session()->get('flash_message') }}
        @endif    
        </div>        
        <div class="alert-close">
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span class="svg-icon svg-icon-primary svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                        <rect x="0" y="7" width="16" height="2" rx="1"/>
                        <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                    </g>
                </g>
            </svg></span>
            </button>
        </div>
</div>
@endif