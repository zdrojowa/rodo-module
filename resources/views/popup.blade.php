<div class="popup__marker" title="Kontakt">
    @image('vendor/img/RodoModule/contact-trigger.svg')
</div>

<div class="popup popup--choose">
    <div class="popup__overlay">
        <div class="popup__body">
            <div class="popup__close">
                @image('vendor/img/RodoModule/ico-close.svg')
            </div>
            <div class="popup__title">@lang('rodo.Choose the contact form')</div>
            <p>@lang('rodo.Our advisor will contact you')</p>
            <div class="popup__actions">
                <button name="phone" type="button" class="popup__action">
                    @image('vendor/img/RodoModule/ico-tel.svg')
                    <span>@lang('rodo.Phone')</span>
                    <span></span>
                </button>
                <button name="email" type="button" class="popup__action">
                    @image('vendor/img/RodoModule/ico-mail.svg')
                    <span>E-mail</span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="popup popup--phone">
    <div class="popup__overlay">
        <div class="popup__body">
            <div class="popup__back">
                @image('vendor/img/RodoModule/ico-back.svg')
            </div>
            <div class="popup__close">
                @image('vendor/img/RodoModule/ico-close.svg')
            </div>
            <div class="popup__title">@lang('rodo.Phone contact')</div>
            <form action="{{ route('RodoModule::sendPhone') }}" method="POST" novalidate class="popup__form" id="popup__form-phone">
                @csrf
                <div class="form-group">
                    <label for="">@lang('rodo.Name and Surname') <sup>*</sup></label>
                    <input name="name" type="text" maxlength="100" required class="form-control">
                    <div class="invalid-feedback">
                        @lang('rodo.Correct the field')
                    </div>
                </div>
                <div class="form-group">
                    <label for="">@lang('rodo.Phone number') <sup>*</sup></label>
                    <input name="phone" type="tel" required id="phone" class="form-control">
                    <div class="invalid-feedback" id="phone-feedback">
                        @lang('rodo.Correct the field')
                    </div>
                </div>

                <div class="form-group">
                    <label for="">@lang('rodo.Phone in hours')</label>
                    <select class="form-control" name="hours">
                        <option selected disabled>@lang('rodo.Choose')</option>
                        <option value="before">@lang('rodo.before') 17:00</option>
                        <option value="after">@lang('rodo.after') 17:00</option>
                    </select>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="agree" required>
                    <label class="form-check-label" for="">
                        @lang('rodo.phone_consent')
                    </label>
                    <div class="invalid-feedback">
                        <sup>*</sup> @lang('rodo.required')
                    </div>
                </div>

                <button
                    class="popup__send popup__action g-recaptcha"
                    data-sitekey="{{ $key }}"
                    data-callback='onSubmitPhone'
                    data-action='contactPhone'
                    data-badge="inline"
                    disabled
                >
                    @lang('rodo.send message')
                </button>
            </form>
        </div>
    </div>
</div>

<div class="popup popup--email">
    <div class="popup__overlay">
        <div class="popup__body">
            <div class="popup__back">
                @image('vendor/img/RodoModule/ico-back.svg')
            </div>
            <div class="popup__close">
                @image('vendor/img/RodoModule/ico-close.svg')
            </div>
            <div class="popup__title">@lang('rodo.Email contact')</div>
            <form action="{{ route('RodoModule::sendEmail') }}" method="POST" novalidate class="popup__form" id="popup__form-email">
                @csrf
                <div class="form-group">
                    <label for="">@lang('rodo.Name and Surname') <sup>*</sup></label>
                    <input name="name" type="text" maxlength="100" required class="form-control">
                    <div class="invalid-feedback">
                        @lang('rodo.Correct the field')
                    </div>
                </div>
                <div class="form-group">
                    <label for="">E-mail <sup>*</sup></label>
                    <input name="email" type="email" required class="form-control">
                    <div class="invalid-feedback">
                        @lang('rodo.Correct the field')
                    </div>
                </div>
                <div class="form-group">
                    <label for="">@lang('rodo.message')</label>
                    <textarea class="form-control" rows="3" name="message"></textarea>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="agree" required>
                    <label class="form-check-label" for="">
                        @lang('rodo.email_consent')
                    </label>
                    <div class="invalid-feedback">
                        <sup>*</sup> @lang('rodo.required')
                    </div>
                </div>

                <button
                    class="popup__send popup__action g-recaptcha"
                    data-sitekey="{{ $key }}"
                    data-callback='onSubmitEmail'
                    data-action='contactEmail'
                    data-badge="inline"
                    disabled
                >
                    @lang('rodo.send message')
                </button>
            </form>
        </div>
    </div>
</div>

<div class="popup popup--success">
    <div class="popup__overlay">
        <div class="popup__body">
            <div class="popup__close">
                @image('vendor/img/RodoModule/ico-close.svg')
            </div>
            <div class="popup__title">@lang('rodo.Message sent successfully')</div>
            <p>@lang('rodo.We will contact you')</p>
            <div class="popup__icon">@image('vendor/img/RodoModule/ico-mail.svg')</div>
        </div>
    </div>
</div>

<div class="popup popup--error">
    <div class="popup__overlay">
        <div class="popup__body">
            <div class="popup__close">
                @image('vendor/img/RodoModule/ico-close.svg')
            </div>
            <div class="popup__title">@lang('rodo.A problem occured')</div>
            <p>@lang('rodo.Please try again later or directly')</p>
            <div class="popup__contact">
                <div class="popup__contact--item">
                    @image('vendor/img/RodoModule/ico-mini-placeholder.svg')
                    <span>@lang('rodo.address')</span>
                </div>
                <div class="popup__contact--item">
                    @image('vendor/img/RodoModule/ico-mini-telephone.svg')
                    <span><a href="{{ __('rodo.phone_link') }}" target="_blank">@lang('rodo.phone')</a></span>
                </div>
                <div class="popup__contact--item">
                    @image('vendor/img/RodoModule/ico-mini-mail.svg')
                    <span><a href="{{ __('rodo.email') }}" target="_blank">@lang('rodo.email')</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
