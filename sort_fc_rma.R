args <- commandArgs(TRUE)
R <- args[1]
N <- args[2]
Z <- args[3]

V <- strtoi(N)


library(dplyr)

setwd(Z)
#setwd("/Applications/XAMPP/xamppfiles/htdocs/Softwarepraktikum/jquery/upload/17-05-17_12-28-13/output")
tab <- read.table("FC_SLR_rma.txt", header = TRUE, row.names=NULL)
names(tab)[names(tab)=="row.names"] <- "GeneID"

if(R=="<="){
  temptab <- dplyr::filter(tab,Foldchange<=(V))
  sorttab <- temptab[order(temptab$Foldchange, decreasing = TRUE), ]
  s <- paste0("FC_<=",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R=="<"){
  temptab <- dplyr::filter(tab,Foldchange< V)
  sorttab <- temptab[order(temptab$Foldchange, decreasing = TRUE), ]
  s <- paste0("FC_<",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R==">="){
  temptab <- dplyr::filter(tab,Foldchange>=(V))
  sorttab <- temptab[order(temptab$Foldchange, decreasing = TRUE), ]
  s <- paste0("FC_>=",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R==">"){
  temptab <- dplyr::filter(tab,Foldchange>(V))
  sorttab <- temptab[order(temptab$Foldchange, decreasing = TRUE), ]
  s <- paste0("FC_>",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R=="max"){
  temptab <- dplyr::top_n(tab,V,Foldchange)
  sorttab <- temptab[order(temptab$Foldchange, decreasing = TRUE), ]
  s <- paste0("FC_max_Top",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R=="min"){
  temptab <- tab[order(tab$Foldchange), ]
  sorttab <- temptab[1:V,]
  s <- paste0("FC_min_Top",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

