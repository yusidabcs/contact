#Contact Module Asgardcms
##Instalasi
    composer require bcscoder/contact

###1. Activate permission from setting page.
###2. Config Recaptcha
login and create new website to : https://www.google.com/recaptcha

Input your site key and secret key to Setting > Contact

###3. Add Recaptcha Js
    <script src='https://www.google.com/recaptcha/api.js'></script>

#How to use
Create form for contact us and add sample code below

    {!! Form::open( ['url' => route('contact.send'), 'method' => 'post'] ) !!}
    
add recaptcha

    @if(setting('contact::security') == 1)
        <div class="form-group">
            <label>Human verification</label>
            <div class="g-recaptcha" data-sitekey="{{ setting('contact::site-key') }}"></div>
        </div>
    @endif
    
Required field
1. `first_name`
2. `last_name`
3. `email`
4. `phone`
5. `message`