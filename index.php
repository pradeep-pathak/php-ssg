<?php
// Directory containing your PHP files
$phpDir = 'templates'; // Adjust this path as necessary
$outputDir = 'output'; // Directory to save generated HTML files

// Create the output directory if it doesn't exist
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}

// Scan for PHP files in the specified directory
$phpFiles = glob($phpDir . '/*.php');

foreach ($phpFiles as $phpFile) {
    // Get the filename without extension
    $currentFile = basename($phpFile, '.php');
    
    // Start output buffering
    ob_start();
    
    // Include the PHP file to execute it
    include $phpFile;
    
    // Capture the output and clean the buffer
    $htmlContent = ob_get_contents();
    ob_end_clean();
    
    // Create the output HTML file name
    $outputFileName = $outputDir . '/' . $currentFile . '.html';
    
    // Save the captured output as an HTML file
    file_put_contents($outputFileName, $htmlContent);
    
    echo "HTML file created: " . $outputFileName . "\n";
}
?>