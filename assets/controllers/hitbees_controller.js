import { Controller } from '@hotwired/stimulus';

export default class extends Controller {

    static values = {
        url: String
    };

    connect() {

    }
 
    hit(event){
        event.preventDefault();
        fetch(this.urlValue)
            .then(response => response.json())
            .then(data => {
                document.getElementById(data.id).textContent = data.point;
                if(data.message){
                    document.getElementById('message').style.display = 'block';
                    document.getElementById('message-content').textContent = data.message;
                    document.getElementById('hit-btn').remove();
                }
            }
        );    
    }

}