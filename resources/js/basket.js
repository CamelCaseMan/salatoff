document.addEventListener('DOMContentLoaded', () => {
 
    const CSRFToken = document.querySelector('meta[name="csrf-token"]').content
    let quty = 1

    qutyInterface()
	function qutyInterface() {
		const interfaces = document.getElementsByClassName('quty-interface')

        Object.values(interfaces).forEach(init)
        function init(interfc) {

            const valueField = interfc.getElementsByClassName('quty-interface-value')[0]
            const buttons = interfc.getElementsByClassName('quty-interface-btn')

            Object.values(buttons).forEach(button => {
                button.addEventListener('click', changeQuty)
            })
            function changeQuty() {
                const symbol = this.dataset.quty;
                switch (symbol) {
                    case '+':
                        quty++
                        break
                    case '-':
                        quty--
                        break
                }
                if (quty <= 0) quty = 1

                valueField.innerText = quty + ' шт.'
            }
            
        }

	}

    /**
     * Корзина
     */
    basketAddCount()
    function basketAddCount() {
        const addButton = document.getElementsByClassName('add-cart-button')[0]
        if ( !addButton ) return;
        addButton.addEventListener('click', function () {
            let productId = this.dataset.id;
            console.log(quty, productId)

            let formData = new FormData();
            formData.append('productId', productId)
            formData.append('count', quty)

            fetch(`/basket/addcount`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': CSRFToken
                },
                body: formData
            })
            .then(response => {
                return response.json()
            })
            .then(data => {
                console.log(data)
            })
            .catch(err => {
                console.log(err)
            })

        })
    }    

    basketAdd()
    function basketAdd() {
        const addButtons = document.getElementsByClassName('add-one-button')

        Object.values(addButtons).forEach(addButton => {
            addButton.addEventListener('click', function (evt) {
                evt.preventDefault()
                evt.stopPropagation()


                let productId = this.dataset.id;
                console.log(productId)
    
                let formData = new FormData();
                formData.append('productId', productId)
    
                fetch(`/basket/add`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': CSRFToken
                    },
                    body: formData
                })
                .then(response => {
                    return response.json()
                })
                .then(data => {
                    console.log(data)
                })
                .catch(err => {
                    console.log( err )
                })
    
            })
        })
    }  

    basketRemove()
    function basketRemove() {
        const removeButtons = document.getElementsByClassName('remove-button')

        Object.values(removeButtons).forEach(removeButton => {
            removeButton.addEventListener('click', function () {
                let productId = this.dataset.id;
                console.log(productId)
    
                let formData = new FormData();
                formData.append('productId', productId)
    
                fetch(`/basket/removeAll`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': CSRFToken
                    },
                    body: formData
                })
                .then(response => {
                    return response.json()
                })
                .then(data => {
                    console.log(data)
                })
                .catch(err => {
                    console.log( err )
                })
    
            })

        })

    }  

})