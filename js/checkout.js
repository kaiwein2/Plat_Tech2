    function updateQuantity(productId, quantity) {
        console.log(`Updating quantity for Product ID: ${productId}, New Quantity: ${quantity}`);
        fetch('update_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: productId, quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const row = document.querySelector(`[data-id="${productId}"]`);
                const price = parseFloat(row.querySelector('.price').dataset.value);
                row.querySelector('.total').textContent = `₱${(price * quantity).toFixed(2)}`;
                recalculateGrandTotal();
            } else {
                console.error(data.message);
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            alert('Error updating cart. Please try again.');
        });
    }

    function recalculateGrandTotal() {
        let grandTotal = 0;
        document.querySelectorAll('.total').forEach(cell => {
            const total = parseFloat(cell.textContent.replace('₱', '').trim());
            grandTotal += isNaN(total) ? 0 : total;
        });
        const totalElement = document.getElementById('grandTotal');
        totalElement.textContent = `₱${grandTotal.toFixed(2)}`;
        totalElement.dataset.total = grandTotal;
    }

    document.getElementById('applyVoucher').addEventListener('click', function () {
        const voucherCode = document.getElementById('voucherCode').value.trim();

        if (voucherCode) {
            fetch('apply_voucher.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ voucherCode: voucherCode }),
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    const discount = parseFloat(data.discount);
                    const totalElement = document.getElementById('grandTotal');
                    const rawTotal = parseFloat(totalElement.dataset.total);
                    const discountedTotal = rawTotal - (rawTotal * (discount / 100));
                    
                    totalElement.textContent = `₱${discountedTotal.toFixed(2)}`;
                    document.getElementById('voucherMessage').textContent = `Voucher applied! ${discount}% discount.`;
                    document.getElementById('voucherMessage').className = 'text-success';
                } else {
                    document.getElementById('voucherMessage').textContent = data.message;
                    document.getElementById('voucherMessage').className = 'text-danger';
                }
            })
            .catch((error) => {
                alert('Error applying voucher. Please try again.');
            });
        } else {
            alert('Please enter a voucher code.');
        }
    });

    document.getElementById('clearCart').addEventListener('click', function() {
        if (confirm('Are you sure you want to clear the cart?')) {
            fetch('clear_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Cart cleared successfully.');
                    window.location.reload();
                } else {
                    alert('Failed to clear cart. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error clearing cart:', error);
                alert('Error clearing cart. Please try again.');
            });
        }
    });

    document.getElementById('confirmCheckout').addEventListener('click', function() {
        fetch('get_updated_cart.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(cartData => {
            console.log('Confirming checkout with cart:', cartData);

            fetch('confirm_checkout.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ cart: cartData })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Checkout successful!');
                    window.location.href = 'index.php';
                } else {
                    alert('Checkout failed. Please try again.');
                }
            });
        });
    });
