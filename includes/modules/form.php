
<section class="form">
    <div class="container">
        <div class="form__wrap">

            <div class="form__top">
                <div class="form__title">
                    Get an application form
                </div>
                <div class="contact-form__right front-form__wrap">
                    <form method="POST"
                        id="contact-form"
                        enctype="multipart/form-data">
                        <fieldset>
                            <input placeholder="Name" name="contactName" id="contact-name" type="text" tabindex="1" >
                        </fieldset>
                        <fieldset>
                            <input placeholder="Email" name="contactEmail" id="contact-email" type="email" tabindex="2" required>
                        </fieldset>
                        <fieldset>
                            <textarea placeholder="Message" name="contactMassage" id="contact-massage" tabindex="7"></textarea>
                        </fieldset>
                        <fieldset>
                            <button class="button--main" name="submit" type="submit" id="contact-submit" data-submit="...Sending">Send</button>
                        </fieldset>
                    </form>
                </div>

                
            </div>

            <div class="form__bottom">
                <img 
                    src="<?= bloginfo('template_url') . '/images/loader.gif' ?>" 
                    data-src="<?= bloginfo('template_url') . '/images/page-front/form.webp' ?>"
                    class="lazy item__rating-img"
                    width="636"
                    height="420"
                />
            </div>
            
        </div>
    </div>
</section>
