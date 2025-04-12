import { collection, addDoc, getDocs, query, orderBy, serverTimestamp, limit } from 'https://www.gstatic.com/firebasejs/11.6.0/firebase-firestore.js';

// Get Firebase instances from window object
const { db } = window.firebase;

// DOM Elements
const reviewsContainer = document.getElementById('reviews-container');
const reviewForm = document.getElementById('review-form');
const overallRating = document.querySelector('.rating-number');
const ratingCount = document.querySelector('.rating-count');

// Create star rating HTML
function createStarRating(rating) {
    let stars = '';
    const starSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 20px; height: 20px; fill: #ffa904; margin-right: 4px;"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>`;
    
    for (let i = 1; i <= 5; i++) {
        stars += `<span style="display: inline-block; opacity: ${i <= rating ? '1' : '0.3'};">${starSVG}</span>`;
    }
    return stars;
}

// Display a review
function displayReview(review) {
    const reviewElement = document.createElement('div');
    reviewElement.className = 'review';
    reviewElement.innerHTML = `
        <div class="review-header">
            <h3>${review.name}</h3>
            <div class="review-rating">${createStarRating(review.rating)}</div>
        </div>
        <p class="review-text">${review.review}</p>
        <div class="review-date">${new Date(review.timestamp?.toDate()).toLocaleDateString()}</div>
    `;
    
    // Apply styles directly to stars after adding to DOM
    const stars = reviewElement.querySelectorAll('.review-rating span');
    stars.forEach((star, index) => {
        star.style.opacity = index < review.rating ? '1' : '0.3';
    });
    
    reviewsContainer.appendChild(reviewElement);
}

// Update overall rating
function updateOverallRating(reviews) {
    if (reviews.length === 0) return;
    
    const totalRating = reviews.reduce((sum, review) => sum + review.rating, 0);
    const averageRating = (totalRating / reviews.length).toFixed(1);
    
    overallRating.textContent = averageRating;
    ratingCount.textContent = `Based on ${reviews.length} reviews`;
    
    // Update the stars using the function from reviews.html
    if (typeof updateOverallRatingStars === 'function') {
        updateOverallRatingStars(parseFloat(averageRating));
    }
}

// Load reviews from Firestore
async function loadReviews() {
    try {
        const reviewsQuery = query(
            collection(db, 'reviews'),
            orderBy('timestamp', 'desc'),
            limit(50)
        );
        
        const querySnapshot = await getDocs(reviewsQuery);
        const reviews = [];
        
        querySnapshot.forEach((doc) => {
            reviews.push({ id: doc.id, ...doc.data() });
        });
        
        reviewsContainer.innerHTML = '';
        reviews.forEach(displayReview);
        updateOverallRating(reviews);
    } catch (error) {
        console.error('Error loading reviews:', error);
    }
}

// Handle form submission
reviewForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const name = document.getElementById('name').value;
    const rating = parseInt(document.querySelector('input[name="rating"]:checked').value);
    const review = document.getElementById('review').value;
    
    try {
        await addDoc(collection(db, 'reviews'), {
            name,
            rating,
            review,
            timestamp: serverTimestamp()
        });
        
        reviewForm.reset();
        loadReviews();
    } catch (error) {
        console.error('Error submitting review:', error);
    }
});

// Load reviews when page loads
loadReviews(); 