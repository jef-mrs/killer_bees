import { Controller } from '@hotwired/stimulus';

export default class extends Controller {

    static values = {
        id: Number,
        url: String
    };
    connect() {
        
    }

    
    hit(event){
        event.preventDefault()
        fetch(this.urlValue +this.idValue+'/hit')
            .then(response => response.json())
            .then(data => {
                let bee = document.getElementById(data.id)
                bee.textContent = data.type+' - '+data.point;
                console.log(data)
                    }
                );
        
        }

}