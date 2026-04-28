class CardProduit extends HTMLElement {

    connectedCallback() {
        this.attachShadow({ mode: 'open' });

        const url = this.getAttribute('url') || '#';
        const title = this.getAttribute('title');
        const image = this.getAttribute('img') || '';
        const categorie = this.getAttribute('categorie') || 0;
        const description = this.getAttribute('description');
        const quantite = parseInt(this.getAttribute('quantite')) || 0;
        const prix = this.getAttribute('prix');
        const dispo = quantite > 0;

        this.shadowRoot.innerHTML = `
        <style>

            * {
                -webkit-user-drag: none;
                user-select: none;
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            :host {
                display: block;
                width: 200px;
                height: 282px;
                border-radius: 12px;
                overflow: hidden;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                box-sizing: border-box;
            }

            .card {
                position: relative;
                width: 100%;
                height: 100%;
                overflow: hidden;
                cursor: pointer;
            }

            .bg-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.4s ease;
                
            }

            .gradient-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 60%;
                background: linear-gradient(0deg, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.7) 40%, rgba(0,0,0,0) 100%);
                opacity: 0;
                transition: opacity 0.3s ease;
                pointer-events: none;
                z-index: 1;
            }

            .manga-cover {
                position: relative;
                z-index: 1;
            }

            #scroll-container.dragging .manga-cover {
                pointer-events: none;
            }
            

            .card:hover .gradient-overlay {
                opacity: 1;
            }

            .content {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                padding: 12px;
                box-sizing: border-box;
                z-index: 2;
                display: flex;
                flex-direction: column;
                justify-content: flex-end;
            }

            .title {
                font-size: 16px;
                font-weight: bold;
                color: white;
                margin: 0;
                text-shadow: 
                    -1px -1px 0 #000,  
                     1px -1px 0 #000,
                    -1px  1px 0 #000,
                     1px  1px 0 #000,
                     0px  4px 4px rgba(0,0,0,0.5);
                transition: text-shadow 0.3s ease, transform 0.3s ease;
                
            }

            .card:hover .title {
                text-shadow: none;
            }

            .hidden-content {
                max-height: 0;
                opacity: 0;
                overflow: hidden;
                transition: max-height 0.4s ease, opacity 0.3s ease;
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .card:hover .hidden-content {
                max-height: 150px;
                opacity: 1;
                margin-top: 4px;
            }

            .tags {
                font-size: 10px;
                color: #e0e0e0;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .interactive-info-box {
                position: relative;
                height: 35px;
                width: 100%;
            }

            .view-default, .view-hover {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                transition: opacity 0.2s ease, transform 0.2s ease;
            }

            .view-default {
                font-size: 14px;
                font-weight: bold;
                color: white;
                opacity: 1;
                transform: translateY(0);
            }

            .view-hover {
                opacity: 0;
                pointer-events: none;
                transform: translateY(10px);
                flex-wrap: wrap;
                align-content: center;
            }

            .interactive-info-box:not(.no-hover):hover .view-default {
                opacity: 0;
                transform: translateY(-10px);
            }

            .interactive-info-box:not(.no-hover):hover .view-hover {
                opacity: 1;
                pointer-events: auto;
                transform: translateY(0);
            }

            .dispo-row {
                width: 100%;
                display: flex;
                align-items: center;
                gap: 5px;
                font-size: 10px;
                color: #ccc;
                margin-bottom: 2px;
            }

            .dot {
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background-color: ${dispo ? '#2ecc71' : '#e74c3c'};
            }

            .price-stars-row {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .price {
                font-size: 14px;
                font-weight: bold;
                color: white;
            }

            .stars-container {
                display: flex;
                align-items: center;
                gap: 2px;
            }

            .stars-container svg {
                width: 10px;
                height: 10px;
            }
            
            .reviews {
                font-size: 9px;
                color: #ccc;
                margin-left: 2px;
            }

            .btn {
                display: block;
                width: 100%;
                padding: 6px 0;
                text-align: center;
                background: rgba(255, 255, 255, 0.6);
                backdrop-filter: blur(4px);
                -webkit-backdrop-filter: blur(4px);
                color: black;
                text-decoration: none;
                font-weight: bold;
                font-size: 13px;
                border-radius: 20px;
                transition: background 0.2s ease;
                margin-top: 4px;
            }

            .btn:hover {
                background: rgba(255, 255, 255, 0.9);
            }
        </style>

        <div class="card">
            <img class="bg-image" src="${image}" alt="${title}">
            <div class="gradient-overlay"></div>
            
            <div class="content">
                <h3 class="title">${title}</h3>
                
                <div class="hidden-content">
                    ${categorie ? `<div class="tags">${categorie}</div>` : ''}
                    
                    <div class="interactive-info-box no-hover">
                        <div class="view-default">
                            ${description || ''}
                        </div>
                    </div>

                    <div class="price">${prix} €</div>

                    <a href="${url}" class="btn">Voir plus</a>
                </div>
            </div>
        </div>
        `;
    }
}

customElements.define('card-produit', CardProduit);