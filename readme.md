

[THE DEPLOYED SITE](https://danish981.github.io/sample-html-work/)


**Renaming Git Branch Locally and Remotely:**


1. Start by switching to the local branch which you want to rename:

   **git checkout <old_name>**

2. Rename the local branch by typing:

   **git branch -m <new_name>**

3. At this point, you have renamed the local branch. If you’ve already pushed the <old_name> branch to the remote repository, perform the next steps to rename the remote branch.

   **git push origin -u <new_name>**

4. Delete the <old_name> remote branch:

   **git push origin --delete <old_name>**

✅ That’s it. You have successfully renamed the local and remote Git branch.
