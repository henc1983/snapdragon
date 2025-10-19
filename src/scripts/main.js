(()=>{
    return {
        window: Object.assign( window , {
            preLoader : document.getElementById( 'snapdragon-site-preloader' ),
            mediaQueryForm : document.forms['snapdragon-device-screen-form'],

            handleMediaQueryForm : ()=>{
                
                const formInput = mediaQueryForm.querySelector('input[name="snapdragon-device-screen"]')
                
                let screen = ( window.innerWidth < 1196 && window.innerWidth > 576 ) ? 'tablet' : ( window.innerWidth < 575.9 ) ? 'mobile' : 'desktop';

                if(formInput.value !== screen) {
                    formInput.value = screen
                    mediaQueryForm.submit()
                }
            },


            resizeEvent : addEventListener( 'resize' , ()=>window.handleMediaQueryForm() ),
        } ),
        

        document: Object.assign( document , {
            domReady : addEventListener( 'DOMContentLoaded' , function(){
                preLoader.classList.replace('show', 'hide')
            } )
        } ),
    }
})()