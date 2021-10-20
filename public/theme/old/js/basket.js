document.addEventListener('DOMContentLoaded', () => {

    qutyInterface()
	function qutyInterface() {
		const interfaces = document.getElementsByClassName('quty-interface')

        Object.values(interfaces).forEach(init)
        function init(interface) {
            const input = interface.getElementsByClassName('quty-interface-value')[0]
            const buttons = interface.getElementsByClassName('quty-interface-btn')

            input.addEventListener('input', inputHandler)
            function inputHandler() {
                this.value = this.value.replace(/[^\d]/g, '')
            }

            input.addEventListener('blur', blurHandler)
            function blurHandler() {
                if (this.value <= 0) this.value = 1
            }

            Object.values(buttons).forEach(button => {
                button.addEventListener('click', changeQuty)
            })
            function changeQuty() {
                const symbol = this.dataset.quty;
                switch (symbol) {
                    case '+':
                        input.value++
                        break
                    case '-':
                        input.value--
                        break
                }
                if (input.value <= 0) input.value = 1
            }
            
        }

	}

    /**
     * Корзина
     */
    basketAddCount()
    function basketAddCount() {
        const addButton = document.getElementsByClassName('add-button')[0]
        if ( !addButton ) return;
        addButton.addEventListener('click', function () {
            let count = document.getElementsByClassName('quty-interface-value')[0].value
            let productId = this.dataset.id;
            console.log(count, productId)

            let formData = new FormData();
            formData.append('productId', productId)
            formData.append('count', count)

            fetch(`/basket/addcount`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
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
                console.error(err)
            })

        })
    }    

    basketAdd()
    function basketAdd() {
        const addButtons = document.getElementsByClassName('add-one-button')

        Object.values(addButtons).forEach(addButton => {
            addButton.addEventListener('click', function () {
                let productId = this.dataset.id;
                console.log(productId)
    
                let formData = new FormData();
                formData.append('productId', productId)
    
                fetch(`/basket/add`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
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
                    console.error(err)
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
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
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
                    console.error( err.json() )
                })
    
            })

        })

    }  

})