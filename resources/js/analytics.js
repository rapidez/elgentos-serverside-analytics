document.addEventListener('turbo:load', () => {
    window.app.$on('checkout-credentials-saved', (data) => {
        if (window.config.gaUserId) {
            let options = { headers: {} }
            if (localStorage.token) {
                options['headers']['Authorization'] = `Bearer ${localStorage.token}`
            }

            axios.post(config.magento_url + '/graphql', {
                query:
                `mutation StartTransaction(
                    $cartId: String
                    $gaUserId: String
                ) {
                    AddGaUserId (
                        cartId: $cartId
                        gaUserId: $gaUserId
                    ) {
                        cartId
                        maskedId
                    }
                }`,
                variables: {
                    cartId: localStorage.mask,
                    gaUserId: window.config.gaUserId
                }
            }, options)
        }
    });
})
