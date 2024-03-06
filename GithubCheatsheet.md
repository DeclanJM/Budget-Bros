# Github Cheatsheet


## <a name="updating"></a> Updating Local Repository
Before you start writing any code, you should make sure you are working on the most up to date version of your codebase.
Type in this command:

        git branch

If your branch is master/main no need to change it, but if you are in a branch other than that you will need to change it. For this example we are using main:

        git checkout main

Once in your main branch, you can now pull from the origin.

        git pull origin main

This will pull all changes from the main branch and update your main branch on your local machine. Now you should create a new branch to work in, we never want to work directly on main.

        git checkout -b <branch-name>

Now we will have created and entered a new branch for us to work on.

If you have any old branches that you have already pushed to and merged with main, you should delete those to prevent unnecessary clutter.

        git branch -d <branch-name>


## Creating a Pull Request
You should only ever be working on one thing at a time. For instance, if I am updating some algorithms in a calculator class, I would name my branch _calculator-algorithm-updates_ and only work on that for this branch.

Once you have finished working on the branch and are ready to send it back to GitHub, you will need to execute these commands:

        git add . (adds everything that was modified)
             OR
        git add specific/file/path

        git commit -m "commit message"

        git push origin <branch-name>

Now we have sent our new branch to Github. From here we will go to our repository and create a Pull Request (PR). Github should give you a pop up saying _"Compare & pull request"_ or you can just go to the _Pull requests_ tab. 

Click on _New pull request._ \
Change the _Compare_ box to the branch you want to merge into main. \
Click _Create pull request_. \
Now the title of the PR should be whatever your commit message was, feel free to change this or add a description but that is not necessary. \
On the right-hand side of the screen, you will want to assign one of your teammates to fulfill the PR and merge your branch into main. \
From there click _Create pull request_ and now you wait for your teammate to merge and delete your branch. 

If you run into a _Merge Conflict_, check out the [Dealing with a Merge Conflict](#merge-conflict) section for assistance.

Congratulations, you have made a PR and it's been merged. Now you should follow the [Updating Local Repository](#updating) to update the main branch on your local machine.


## <a name = "merge-conflict"></a> Dealing with a Merge Conflict
A merge conflict will occur when multiple people are working on the same file. If neither person [updates their local repo](#updating), and they both make commits, the second one to try to make a PR will have a merge conflict because where the second one was expecting a blank line, the main was updated with code from the first one. Merge conflicts can be avoided if everyone makes sure they're working on the same, updated repo. But, if you do run into one, you will have to do some manual editing in the Github editor to make the code compatible. If you need help resolving the _Merge Conflict_, follow this video's instructions: <a href = "https://www.youtube.com/watch?v=HosPml1qkrg">The EXTREMELY helpful guide to merge conflicts
</a> 