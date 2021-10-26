document.addEventListener('DOMContentLoaded', () => {
 
    const CSRFToken = document.querySelector('meta[name="csrf-token"]').content
    const headerQuty = document.getElementById('header-quty')
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
        const startQutyField = document.getElementsByClassName('quty-start')[0]

        if ( !addButton || !startQutyField ) return;
        quty = +startQutyField.dataset.value

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

                addButton.innerText = 'Изменить колличество'

                headerQuty.innerText = data.count
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
            addButton.addEventListener('click', function addButtonEvent(evt) {
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

                    addButton.classList.add('--done')
                    addButton.removeEventListener('click', addButtonEvent)

                    headerQuty.innerText = data.count
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
                    headerQuty.innerText = data.count

                    document.getElementById('basket-row-' + productId).remove()
                })
                .catch(err => {
                    console.log( err )
                })
    
            })

        })

    }  

    basketAddInCart()
    function basketAddInCart() {

        const basketRows = document.getElementsByClassName('basket-row-intenface')

        Object.values(basketRows).forEach(init)

        function init(row) {
            let quty = +row.dataset.count
            const productId = row.dataset.id

            const valueField = row.getElementsByClassName('quty-interface-value')[0]
            const buttons = row.getElementsByClassName('quty-interface-btn')

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
    
    
                    headerQuty.innerText = data.count
                })
                .catch(err => {
                    console.log(err)
                })
            }


        }

    }



})