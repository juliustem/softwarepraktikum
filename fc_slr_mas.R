args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]
O <- args[3]
P1 <- args[4]
P2 <- args[5]

library(Biobase)
library(BiocGenerics)
library(BiocInstaller)
#library(cluster)
#library(genefilter)
library(affy)
#library(affycomp)
library(affydata)
library(affyio)
#library(simpleaffy)
#library(sm)
#library(BH)
#library(bioDist)
#library(MVA)
#library(qcc)
#library(made4)
#library(ade4)
library(gtools)

setwd(P1)
G1 <- ReadAffy()
mas1 <- mas5(G1)
ma1 <- (exprs(mas1)) 
setwd('..')
setwd('..')
setwd('output')
write.table(ma1, "G1_mas.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)
setwd('..')
setwd('input/G2/')
G2 <- ReadAffy()
mas2 <- mas5(G2)
ma2 <- (exprs(mas2))
setwd('..')
setwd('..')
setwd('output')
write.table(ma2, "G2_mas.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)

Data1 <- read.table("G1_mas.txt", header=TRUE)
Data2 <- read.table("G2_mas.txt", header=TRUE)

#setwd("/Applications/XAMPP/xamppfiles/htdocs/Softwarepraktikum/jquery/upload/09-05-17_05-20-34/output")
#go <-read.table("SLR_max_Top15_RMA.txt", header = TRUE)

m1 <- apply(Data1, 1, FUN=mean)
m2 <- apply(Data2, 1, FUN=mean)
m1max <- apply(Data1, 1, FUN=max)
m2max <- apply(Data2, 1, FUN=max)
m1min <- apply(Data1, 1, FUN=min)
m2min <- apply(Data2, 1, FUN=min)

m1var <- apply(Data1, 1, FUN=var)
m1stdabw <- c()
for (l in 1:(length(m1var))){
  m1stdabw[l]=sqrt(abs(m1var[l]))
}
m2var <- apply(Data2, 1, FUN=var)
m2stdabw <- c()
for (l in 1:(length(m2var))){
  m2stdabw[l]=sqrt(abs(m2var[l]))
}

n1 <- length(Data1)
n2 <- length(Data2)
f_list <- c()

for (i in 1:n1){
  for (j in 1:n2){
    d1 <- log2(Data1[,i])
    d2 <- log2(Data2[,j])   
    d_tab <- cbind(d1,d2) 
    slr <- apply(d_tab,1,FUN=diff)
    #f <- foldchange(Data1[,i],Data2[,j])
    #f_list <- cbind(f_list,f)
  }
}

#fmean_list <- c()
#for(k in 1:(length(f_list)/length(f_list[1,]))){
  #fmean <- mean(f_list[k,])
  #fmean_list <- c(fmean_list,fmean)
#}

fc <- logratio2foldchange(slr, base=2)
#fc <- foldchange(m1, m2)
#slr <- foldchange2logratio(fmean_list, base=2)

result <- cbind(Foldchange=fmean_list, Logratio=slr,"Mittelwert_G1"=m1,"Mittelwert_G2"=m2,
                "Max_G1"=m1max, "Max_G2"=m2max, "Min_G1"=m1min, "Min_G2"=m2min,
                "Stdabw_G1"=m1stdabw, "Stdabw_G2"=m2stdabw)

write.table(result, "FC_SLR_mas.txt", sep="\t", row.names=T, col.names=T, quote=F)

