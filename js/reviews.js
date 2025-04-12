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
    for (let i = 1; i <= 5; i++) {
        stars += `<i class="fas fa-star${i <= rating ? '' : '-o'}"></i>`;
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
    reviewsContainer.appendChild(reviewElement);
}

// Update overall rating
function updateOverallRating(reviews) {
    if (reviews.length === 0) return;
    
    const totalRating = reviews.reduce((sum, review) => sum + review.rating, 0);
    const averageRating = (totalRating / reviews.length).toFixed(1);
    
    overallRating.textContent = averageRating;
    ratingCount.textContent = `Based on ${reviews.length} reviews`;
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