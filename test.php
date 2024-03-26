<?php


// Flatten the array of orders
$flattenedItems = [];
foreach ($orders as $order) {
    foreach ($order['cart'] as $item) {
        $flattenedItems[] = $item;
    }
}

// Group items by their IDs and sum up their quantities
$groupedItems = collect($flattenedItems)->groupBy('id')->map(function ($items) {
    return $items->sum('quantity');
});

// Sort grouped items by total counts in descending order
$sortedItems = $groupedItems->sortDesc();

// Take the top 5 items
$topItems = $sortedItems->take(5);

// Extract IDs and quantities of the top 5 items
$topItemIDs = $topItems->keys()->toArray();
$topItemQuantities = $topItems->values()->toArray();

// Prepare data for the pie chart
$series = $topItemQuantities;
$labels = $topItemIDs; // You can replace item IDs with item names if available

// Construct options for the pie chart
$options = [
    'series' => $series,
    'chart' => [
        'width' => 380,
        'type' => 'pie',
    ],
    'labels' => $labels,
    'responsive' => [
        [
            'breakpoint' => 480,
            'options' => [
                'chart' => [
                    'width' => 200
                ],
                'legend' => [
                    'position' => 'bottom'
                ]
            ]
        ]
    ]
];

// Pass $options to your view for rendering the pie chart
