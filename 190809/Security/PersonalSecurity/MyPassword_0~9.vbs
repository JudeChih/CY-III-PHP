' MyPassword.vbs
'
' 產生一組亂數到記事本
' 程式作者: Wolfgang Chien <wolgang.chien@gmail.com>
' 
' 以下三項參數請視需要修改:
' 一共要產生幾列密碼:
RowCount = 8
' 每列幾個字元:
CharPerRow = 16
Chars = "0123456789"

Seed = InputBox("請輸入亂數密碼:", "詢問", "671990")
Randomize Seed

Set Shell = WScript.CreateObject("WScript.Shell")
Shell.Run "Notepad.exe"
WScript.Sleep 200
Shell.AppActivate "未命名 - 記事本"

For Row = 1 To RowCount
  Line = ""
  For Col = 1 to CharPerRow
    RndNumber = Int(Len(Chars) * Rnd + 1)
    Line = Line + Mid(Chars, RndNumber, 1)
    If (Col Mod 4) = 0 And Col <> CharPerRow Then
      Line = Line + "-"
    End If
  Next
  WScript.Sleep 50
  Shell.SendKeys Line + "{Enter}"
Next
