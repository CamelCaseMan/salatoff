document.addEventListener('DOMContentLoaded', () => {
 
    const CSRFToken = document.querySelector('meta[name="csrf-token"]').content
    const headerQuty = document.getElementById('header-quty')
    const totalPrice = document.getElementById('total-price')
    const basketInput = document.getElementById('basket-submit-total')
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

            let formData = new FormData();
            formData.append('productId', productId)
            formData.append('count', quty)

            sendBasket('/basket/addcount', formData, (err, data) => {
                if (err) {
                    console.log(err)
                    return
                }
                console.log(data)

                addButton.innerText = 'Изменить количество'
                headerQuty.innerText = data.count
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
                let formData = new FormData();
                formData.append('productId', productId)
    

                sendBasket('/basket/add', formData, (err, data) => {
                    if (err) {
                        console.log(err)
                        return
                    }
                    console.log(data)

                    addButton.classList.add('--done')
                    addButton.removeEventListener('click', addButtonEvent)

                    headerQuty.innerText = data.count
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
    
                let formData = new FormData();
                formData.append('productId', productId)
    

                sendBasket('/basket/removeAll', formData, (err, data) => {
                    if (err) {
                        console.log(err)
                        return
                    }

                    console.log(data)

                    headerQuty.innerText = data.count

                    const row = document.getElementById('basket-row-' + productId)
                    row.style.height = row.offsetHeight + 'px'
                    row.style.overflow = 'hidden'
                    setTimeout( () => {
                        row.classList.add('--hide')
                    } )
                    setTimeout( () => {
                        row.remove()
                    }, 300 )

                    if (totalPrice) {
                        totalPrice.innerText = data.total
                    }

                    if (data.count == 0) location.reload()

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

                sendBasket('/basket/addcount', formData, (err, data) => {
                    if (err) {
                        console.log(err)
                        return
                    }
                    console.log(data)
    
                    headerQuty.innerText = data.count

                    if (totalPrice) {
                        totalPrice.innerText = data.total
                    }
                    if (basketInput) {
                        basketInput.value = data.total
                        const event = new Event( 'change', {bubbles : true, cancelable : true} )
                        basketInput.dispatchEvent(event)
                    }
                })

            }

        }

    }

    basketRepeat()
    function basketRepeat() {
        const buttons = document.getElementsByClassName('repeat-order')

        Object.values(buttons).forEach(init)
        function init(button) {
            const id = button.dataset.id
            const wrapper = document.getElementById(id)

            if (! wrapper) return

            const products = []
            const productsHTML = wrapper.getElementsByClassName('repeat-product')

            Object.values(productsHTML).forEach(product => {
                const id = product.dataset.id
                const count = product.dataset.count
                const button = product.getElementsByClassName('add-one-button')[0]
                products.push({
                    id,
                    count,
                    button
                })
            })

            button.addEventListener('click', () => {
                sendProducts(products, button)
            })

        }

        function sendProducts(products, button) {

            for (let product of products) {
                const formData = new FormData();
                formData.append('productId', product.id)
                formData.append('count', product.count)
    
                sendBasket('/basket/addcount', formData, (err, data) => {
                    if (err) {
                        console.log(err)
                        return
                    }
                    console.log(data)
    
                    product.button.classList.add('--done')
                    button.classList.add('--done')
                    headerQuty.innerText = data.count
                })

            }
        }
    }

    
    function sendBasket(url, formData, callback) {

        fetch(url, {
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
            callback(null, data)
        })
        .catch(err => {
            callback(err, null)
        })

    }

})