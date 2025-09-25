$files = Get-ChildItem -Path 'c:\xampp\htdocs\filiereheava-main - Copie\resources\views' -Recurse -Filter '*.blade.php'

foreach ($file in $files) {
    $content = Get-Content -Path $file.FullName -Raw
    $newContent = $content -replace '#038[cC]4[fF]', '#FC4E00'
    if ($content -ne $newContent) {
        Set-Content -Path $file.FullName -Value $newContent
        Write-Host "Updated: $($file.FullName)"
    }
}

Write-Host "Color replacement completed!"