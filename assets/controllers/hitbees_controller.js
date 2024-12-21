import { Controller } from '@hotwired/stimulus';

export default class extends Controller {

    static values = {
        url: String
    };
    static targets = ["point"]

    connect() {

    }

    
    hit(event){
        event.preventDefault();
        fetch(this.urlValue)
            .then(response => response.json())
            .then(data => {
                document.getElementById(data.id).textContent = data.point;
                if(data.message){
                    alert(data.message)
                }
            }
        );    
    }

}