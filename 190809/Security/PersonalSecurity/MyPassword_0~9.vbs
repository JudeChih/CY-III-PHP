' MyPassword.vbs
'
' ���ͤ@�նüƨ�O�ƥ�
' �{���@��: Wolfgang Chien <wolgang.chien@gmail.com>
' 
' �H�U�T���Ѽƽе��ݭn�ק�:
' �@�@�n���ʹX�C�K�X:
RowCount = 8
' �C�C�X�Ӧr��:
CharPerRow = 16
Chars = "0123456789"

Seed = InputBox("�п�J�üƱK�X:", "�߰�", "671990")
Randomize Seed

Set Shell = WScript.CreateObject("WScript.Shell")
Shell.Run "Notepad.exe"
WScript.Sleep 200
Shell.AppActivate "���R�W - �O�ƥ�"

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
