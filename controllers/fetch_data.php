<?php
include '../includes/db.php';

// Initialize response array
$response = array();

// Fetch total books and percentage change
$totalBooksQuery = "SELECT COUNT(*) AS totalBooks FROM books";
$totalBooksResult = $conn->query($totalBooksQuery);
$totalBooks = $totalBooksResult->fetch_assoc()['totalBooks'];
$response['totalBooks'] = $totalBooks;

// For the sake of simplicity, let's assume percentage change values
$response['totalBooksChange'] = 5; // Replace with actual calculation

// Fetch total members and percentage change
$totalMembersQuery = "SELECT COUNT(*) AS totalMembers FROM members";
$totalMembersResult = $conn->query($totalMembersQuery);
$totalMembers = $totalMembersResult->fetch_assoc()['totalMembers'];
$response['totalMembers'] = $totalMembers;

$response['totalMembersChange'] = 3; // Replace with actual calculation

// Fetch active loans and percentage change
$activeLoansQuery = "SELECT COUNT(*) AS activeLoans FROM active_loans";
$activeLoansResult = $conn->query($activeLoansQuery);
$activeLoans = $activeLoansResult->fetch_assoc()['activeLoans'];
$response['activeLoans'] = $activeLoans;

$response['activeLoansChange'] = 10; // Replace with actual calculation

// Fetch late returns and percentage change
$lateReturnsQuery = "SELECT COUNT(*) AS lateReturns FROM loan_history WHERE status = 'late'";
$lateReturnsResult = $conn->query($lateReturnsQuery);
$lateReturns = $lateReturnsResult->fetch_assoc()['lateReturns'];
$response['lateReturns'] = $lateReturns;

$response['lateReturnsChange'] = -20; // Replace with actual calculation

// Fetch data for chart (example for the last 5 weeks)
$chartDataQuery = "
SELECT 
    WEEK(loan_date) AS week, 
    COUNT(DISTINCT book_id) AS totalBooks, 
    COUNT(DISTINCT member_id) AS totalMembers, 
    COUNT(*) AS activeLoans, 
    SUM(CASE WHEN status = 'late' THEN 1 ELSE 0 END) AS lateReturns
FROM 
    loan_history 
GROUP BY 
    WEEK(loan_date)
ORDER BY 
    WEEK(loan_date) DESC
LIMIT 5";

$chartDataResult = $conn->query($chartDataQuery);

$chartData = array();
while ($row = $chartDataResult->fetch_assoc()) {
    $chartData[] = $row;
}
$response['chartData'] = array_reverse($chartData); // Reverse to show the latest week last

// Close the connection
$conn->close();

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
