import { Controller } from '@hotwired/stimulus';


export default class extends Controller {

    
    connect() {

        setInterval(this.flying, 1000);
    }

    flying() {

            document.getElementById('hit-btn').style['left'] = `${Math.random() * 90}%`
            document.getElementById('hit-btn').style['top'] = `${Math.random() * 90}%`


        }
    

}
