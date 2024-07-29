document.addEventListener('DOMContentLoaded', () => {
    const filterForm = document.getElementById('filterForm');
    const productList = document.getElementById('productList');
    const pagination = document.getElementById('pagination');

    filterForm.addEventListener('submit', (event) => {
        event.preventDefault();
        fetchProducts();
    });

// sourcery skip: avoid-function-declarations-in-blocks
    async function fetchProducts(page = 1) {
        const formData = new FormData(filterForm);
        const query = new URLSearchParams(formData);
        query.append('page', page);
        console.log(query.toString())
        const response = await fetch(`fetch_products.php?${query.toString()}`);
        const data = await response.json();
        displayProducts(data.products);
        setupPagination(data.totalPages, page);
    }

//     productElement.innerHTML = `
//     <img src="${product.image_url}" alt="${product.name}" class="productImage" >
//     <div>
//         
//     </div>
// `;



// sourcery skip: avoid-function-declarations-in-blocks
    function displayProducts(products) {
        productList.innerHTML = '';
        products.forEach(product => {
            const parent = document.getElementById('productList');
            const productElement = document.createElement('div');
            productElement.className = 'product';
            
            const productImage = document.createElement('img');
            productImage.src = `${product.image_url}`;
            productImage.alt = 'image';
            productImage.className = 'productImage';

            productElement.appendChild(productImage);
            const productDescription = document.createElement('div');
            productDescription.innerHTML = `
                <h4>${product.name}</h4>
                <p>Price: $${product.price}</p>
                <p>Category: ${product.category}</p>
                <p>Sale Status: ${product.sale_status}</p>
                <p>Stock Status: ${product.stock_status}</p>
            `
            productElement.appendChild(productDescription);
            parent.appendChild(productElement);

        });
    }

    function setupPagination(totalPages, currentPage) {
        pagination.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            if (i === currentPage) {
                button.disabled = true;
            }
            button.addEventListener('click', () => fetchProducts(i));
            pagination.appendChild(button);
        }
    }

   
});
