# Load Windows Forms assembly
Add-Type -AssemblyName System.Windows.Forms


$jsonPath = "$PSScriptRoot\templates\PowerPhish.json"
$jsonConfig =  Get-Content -Path $jsonPath -Raw | ConvertFrom-Json

#Write-Host = "Server: " + $jsonConfig.SERVER 

# Function to load CSV files from the /recipients directory
function Load-RecipientFiles {
    $files = Get-ChildItem -Path "$PSScriptRoot/recipients" -Filter *.csv
    return $files.Name
}

# Function to load HTML template files from the /templates directory
function Load-TemplateFiles {
    $files = Get-ChildItem -Path "$PSScriptRoot/templates" -Filter *.html
    return $files.Name
}

# Function to load the corresponding JSON file for the selected template
function Load-TemplateJson {
    param (
        [string]$templateName
    )
    $jsonPath = "$PSScriptRoot/templates/$templateName.json"
    if (Test-Path -Path $jsonPath) {
        return Get-Content -Path $jsonPath -Raw | ConvertFrom-Json
    } else {
        return $null
    }
}

# Create the form
$form = New-Object System.Windows.Forms.Form
$form.Text = "PowerPhish - PowerShellEngineer.com"
$form.Width = 400
$form.Height = 350

# Dropdown for selecting the recipient list
$recipientLabel = New-Object System.Windows.Forms.Label
$recipientLabel.Text = "Select Recipient List:"
$recipientLabel.Location = New-Object System.Drawing.Point(10, 20)
$recipientLabel.AutoSize = $true
$form.Controls.Add($recipientLabel)

$recipientDropdown = New-Object System.Windows.Forms.ComboBox
$recipientDropdown.Location = New-Object System.Drawing.Point(150, 18)
$recipientDropdown.Width = 200
$recipientDropdown.Items.AddRange((Load-RecipientFiles))
$form.Controls.Add($recipientDropdown)

# Dropdown for selecting the email template
$templateLabel = New-Object System.Windows.Forms.Label
$templateLabel.Text = "Select Email Template:"
$templateLabel.Location = New-Object System.Drawing.Point(10, 60)
$templateLabel.AutoSize = $true
$form.Controls.Add($templateLabel)

$templateDropdown = New-Object System.Windows.Forms.ComboBox
$templateDropdown.Location = New-Object System.Drawing.Point(150, 58)
$templateDropdown.Width = 200
$templateDropdown.Items.AddRange((Load-TemplateFiles))
$form.Controls.Add($templateDropdown)

# Label and TextBox for Web Server
$webServerLabel = New-Object System.Windows.Forms.Label
$webServerLabel.Text = "Web Server:"
$webServerLabel.Location = New-Object System.Drawing.Point(10, 100)
$webServerLabel.AutoSize = $true
$form.Controls.Add($webServerLabel)

$webServerTextbox = New-Object System.Windows.Forms.TextBox
$webServerTextbox.Location = New-Object System.Drawing.Point(150, 98)
$webServerTextbox.Width = 200
$form.Controls.Add($webServerTextbox)

# Label and TextBox for Web Server
$webServerLabel = New-Object System.Windows.Forms.Label
$webServerLabel.Text = "Web Server:"
$webServerLabel.Location = New-Object System.Drawing.Point(10, 100)
$webServerLabel.AutoSize = $true
$form.Controls.Add($webServerLabel)

$webServerTextbox = New-Object System.Windows.Forms.TextBox
$webServerTextbox.Location = New-Object System.Drawing.Point(150, 98)
$webServerTextbox.Width = 200
$form.Controls.Add($webServerTextbox)

# Button to send the emails
$sendButton = New-Object System.Windows.Forms.Button
$sendButton.Text = "Send Emails"
$sendButton.Location = New-Object System.Drawing.Point(150, 180)
$sendButton.Width = 100
$form.Controls.Add($sendButton)

# Event to handle the send emails button click
$sendButton.Add_Click({
    $recipientFile = $recipientDropdown.SelectedItem
    $templateFile = $templateDropdown.SelectedItem
    $apiKey = $apiKeyTextbox.Text
    $webServer = $webServerTextbox.Text

    if (-not $recipientFile -or -not $templateFile) {
        [System.Windows.Forms.MessageBox]::Show("Please select both a recipient list and an email template.")
        return
    }

    # Load the recipients from the selected CSV file
    $recipients = Import-Csv -Path "$PSScriptRoot/recipients/$recipientFile"

    # Load the email body from the selected HTML template
    $emailBody = Get-Content -Path "$PSScriptRoot/templates/$templateFile" -Raw

    # Load the JSON data from the corresponding file
    $templateName = [System.IO.Path]::GetFileNameWithoutExtension($templateFile)
    $jsonData = Load-TemplateJson -templateName $templateName

    if (-not $jsonData) {
        [System.Windows.Forms.MessageBox]::Show("Could not find or load the JSON file associated with the selected template.")
        return
    }

    # Set the email subject and replace the URL placeholder
    $APIKEY = $jsonConfig.APIKEY 
    $from = $jsonConfig.FROM 
    $subject = $jsonData.Subject


    # Iterate through each recipient and send an email
    foreach ($recipient in $recipients) {
        $to = $recipient.EmailAddress
        $firstName = $recipient.firstName
        $lastName = $recipient.lastName
        $fullName = $firstName + " " + $lastName
        $finalBody = $emailBody -replace '{Name}', $recipient.Name

        $url = "http://" + $jsonConfig.SERVER + "/" + $jsonData.URL + "?firstName=" + $firstName + "&lastName=" + $lastName + "&email=" + $recipient.EmailAddress
        Write-Host "URL: " + $url
        $emailBody = Get-Content -Path "$PSScriptRoot/templates/$templateFile" -Raw
        $emailBody = $emailBody -replace '====URLPLACEHOLDER====', $url

        #Replace First Name
        $emailBody = $emailBody -replace '====FIRSTNAME====', $firstName

        $Params = @{
            "URI"            = 'https://api.mailgun.net/v3/nileschools.org/messages'
            "Form"           = @{
              "from"    = $from
              "to"      = $to
              "subject" = $subject
              "html"    = $emailBody
            }
            "Authentication" = 'Basic'
            "Credential"     = (New-Object System.Management.Automation.PSCredential ("api", ($APIKEY | ConvertTo-SecureString -AsPlainText)))
            "Method"         = 'POST'
          }
          
          Invoke-RestMethod @Params



        Start-Sleep -Seconds 2

       }

    [System.Windows.Forms.MessageBox]::Show("Emails have been sent successfully.")
})

# Show the form
$form.ShowDialog()


# .Net methods for hiding/showing the console in the background
Add-Type -Name Window -Namespace Console -MemberDefinition '
[DllImport("Kernel32.dll")]
public static extern IntPtr GetConsoleWindow();

[DllImport("user32.dll")]
public static extern bool ShowWindow(IntPtr hWnd, Int32 nCmdShow);
'

    $consolePtr = [Console.Window]::GetConsoleWindow()
    #0 hide
    [Console.Window]::ShowWindow($consolePtr, 0)

