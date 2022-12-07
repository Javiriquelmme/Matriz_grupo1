import sys

filas_a    = int (input (u'Ingrese el n\u00FAmero de filas de la matriz A   : '.encode('utf-8')))
columnas_a = int (input (u'Ingrese el n\u00FAmero de columnas de la matriz A: '.encode('utf-8')))
filas_b    = int (input (u'Ingrese el n\u00FAmero de filas de la matriz B   : '.encode('utf-8')))
columnas_b = int (input (u'Ingrese el n\u00FAmero de columnas de la matriz B: '.encode('utf-8')))
if filas_a<1 or columnas_a<1 or filas_b<1 or columnas_b<1 or columnas_a!=filas_b:
    print ('\nLas matrices no se pueden multiplicar.')
else:
    a = []
    b = []
    c = []
    print ('')
    for i in range (filas_a):
        a.append ([])
        for j in range (columnas_a):
            a[i].append (float (input ('Ingrese el elemento A[' + repr (i) + '][' + repr (j) + ']: ')))
    print ('')
    for i in range (filas_b):
        b.append ([])
        for j in range (columnas_b):
            b[i].append (float (input ('Ingrese el elemento B[' + repr (i) + '][' + repr (j) + ']: ')))
    for i in range (filas_a):
        c.append ([])
        for j in range (columnas_b):
            c[i].append (0)
            for k in range (filas_b):
                c[i][j] += a[i][k] * b[k][j]
    print ('\nResultado:')
    for fila in c:
        sys.stdout.write ('[\t')
        for e in fila:
            sys.stdout.write (repr (e) + '\t')
        print (']')